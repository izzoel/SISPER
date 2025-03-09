<?php

namespace App\Services;

use Exception;
use Google\Client;
use Google\Service\Docs;
use Google\Service\Drive;
use Google\Service\Drive\DriveFile;
use Illuminate\Support\Facades\Log;
use Google\Service\Drive\Permission;

class GoogleService
{
    protected $docsService;
    protected $driveService;
    protected $templateId;
    protected $folderId;

    public function __construct()
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/private/google/credentials.json'));
        $client->addScope([Docs::DOCUMENTS, Drive::DRIVE]);

        $this->docsService = new Docs($client);
        $this->driveService = new Drive($client);
        $this->templateId = env('GOOGLE_DOC_TEMPLATE_ID'); // ID Template Dokumen
        $this->folderId = env('GOOGLE_DRIVE_FOLDER_ID');
    }

    public function shareDocument($documentId)
    {
        try {
            $permission = new Permission([
                'type' => 'anyone', // Bisa juga 'user' jika hanya untuk akun tertentu
                'role' => 'writer', // Bisa 'writer' jika ingin edit
            ]);

            return $this->driveService->permissions->create($documentId, $permission);
        } catch (Exception $e) {
            return 'Error sharing document: ' . $e->getMessage();
        }
    }

    public function shareDocumentWithEmail($documentId, $email)
    {
        try {
            $permission = new Permission([
                'type' => 'user',
                'role' => 'writer', // Bisa 'reader' jika hanya untuk melihat
                'emailAddress' => $email,
            ]);

            return $this->driveService->permissions->create($documentId, $permission);
        } catch (Exception $e) {
            return 'Error sharing document with email: ' . $e->getMessage();
        }
    }


    public function duplicateDocument($newTitle)
    {
        // Buat salinan dokumen di Google Drive
        $copy = new DriveFile([
            'name' => $newTitle, // Nama dokumen hasil duplikasi
            'parents' => [$this->folderId],
        ]);

        $file = $this->driveService->files->copy($this->templateId, $copy);

        return $file->id; // ID dokumen yang baru dibuat
    }

    public function replaceText($documentId, $replacements)
    {
        $ranges = [];
        $requests = [];
        $allowedPlaceholders = ['kejuaraan', 'sertifikat', 'beasiswa', 'organisasi'];

        foreach ($replacements as $placeholder => $value) {
            $placeholderText = "{{" . $placeholder . "}}";

            if (in_array($placeholder, $allowedPlaceholders) && strpos($value, "\n") !== false) {
                $ranges[$placeholder] = $this->replaceTextInTable($documentId, $placeholderText, $value, $placeholder);
            } else {
                $requests[] = [
                    'replaceAllText' => [
                        'containsText' => [
                            'text' => $placeholderText,
                            'matchCase' => true,
                        ],
                        'replaceText' => $value,
                    ],
                ];
            }
        }

        $this->docsService->documents->batchUpdate($documentId, new \Google\Service\Docs\BatchUpdateDocumentRequest([
            'requests' => $requests,
        ]));
    }


    public function replaceTextInTable($documentId, $placeholderText, $value, $placeholder)
    {
        $document = $this->docsService->documents->get($documentId);
        $requests = [];
        $allowedPlaceholders = ['kejuaraan', 'sertifikat', 'beasiswa', 'organisasi'];
        $range = null;

        foreach ($document->getBody()->getContent() as $element) {
            if (isset($element->table)) {
                foreach ($element->table->tableRows as $rowIndex => $row) {
                    foreach ($row->tableCells as $cellIndex => $cell) {
                        foreach ($cell->content as $cellElement) {
                            if (isset($cellElement->paragraph)) {
                                foreach ($cellElement->paragraph->elements as $textRunIndex => $textRun) {
                                    if (isset($textRun->textRun)) {
                                        $text = $textRun->textRun->content;
                                        if (strpos($text, $placeholderText) !== false) {
                                            $startIndex = $textRun->startIndex;

                                            $items = array_filter(explode("\n", trim($value)), 'strlen');
                                            $insertRequests = [];

                                            $deleteRequest = [
                                                'replaceAllText' => [
                                                    'containsText' => [
                                                        'text' => $placeholderText,
                                                        'matchCase' => true,
                                                    ],
                                                    'replaceText' => "",
                                                ]
                                            ];

                                            $newStart = $startIndex;
                                            $textLength = 0;

                                            $itemCount = count($items);
                                            for ($i = $itemCount - 1; $i >= 0; $i--) {
                                                $cleanedText = trim($items[$i]);

                                                $insertRequests[] = [
                                                    'insertText' => [
                                                        'location' => ['index' => $startIndex],
                                                        'text' => ($i < $itemCount - 1) ? $cleanedText . "\n" : $cleanedText,
                                                    ]
                                                ];

                                                $textLength += strlen($cleanedText) + ($i < $itemCount - 1 ? 1 : 0);
                                            }

                                            $newEnd = $newStart + $textLength;

                                            if ($items) {
                                                $range = ['startIndex' => $newStart, 'endIndex' => $newEnd];
                                            }

                                            $requests = array_merge([$deleteRequest], $insertRequests);

                                            if ($range && in_array($placeholder, $allowedPlaceholders)) {
                                                $requests[] = [
                                                    'updateTextStyle' => [
                                                        'range' => [
                                                            'startIndex' => $newStart,
                                                            'endIndex' => $newEnd,
                                                        ],
                                                        'textStyle' => [
                                                            'bold' => false,
                                                            'italic' => false,
                                                        ],
                                                        'fields' => 'bold,italic'
                                                    ]
                                                ];

                                                $requests[] = [
                                                    'createParagraphBullets' => [
                                                        'range' => [
                                                            'startIndex' => $newStart,
                                                            'endIndex' => $newEnd,
                                                        ],
                                                        'bulletPreset' => 'NUMBERED_DECIMAL_ALPHA_ROMAN'
                                                    ]
                                                ];

                                                $requests[] = [
                                                    'updateParagraphStyle' => [
                                                        'range' => [
                                                            'startIndex' => $newStart,
                                                            'endIndex' => $newEnd,
                                                        ],
                                                        'paragraphStyle' => [
                                                            'indentFirstLine' => ['magnitude' => 0.0, 'unit' => 'PT'],
                                                            'indentStart' => ['magnitude' => 9.36, 'unit' => 'PT'],
                                                        ],
                                                        'fields' => 'indentFirstLine,indentStart'
                                                    ]
                                                ];
                                            }

                                            if (!empty($requests)) {
                                                $this->docsService->documents->batchUpdate($documentId, new \Google\Service\Docs\BatchUpdateDocumentRequest([
                                                    'requests' => $requests,
                                                ]));
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return $range;
    }
}
