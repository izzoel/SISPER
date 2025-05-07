<?php

namespace App\Services;

use Exception;
use Google\Client;
use Google\Service\Docs;
use App\Models\Laboran;
use Google\Service\Drive;
use Google\Service\Drive\DriveFile;
use Illuminate\Support\Facades\Log;
use Google\Service\Drive\Permission;
use Illuminate\Support\Facades\Storage;



class GoogleService
{
    protected $docsService;
    protected $driveService;
    protected $templateId;
    protected $templateForbela;
    protected $templateDiplomaTigaAnalisKesehatan;
    protected $templateDiplomaTigaFarmasi;
    protected $templateIjazah;
    protected $folderId;
    protected $folderForbela;
    protected $folderDversi;

    public function __construct()
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/private/google/credentials.json'));
        $client->addScope([Docs::DOCUMENTS, Drive::DRIVE]);

        $this->docsService = new Docs($client);
        $this->driveService = new Drive($client);
        $this->templateId = env('GOOGLE_DOC_TEMPLATE_ID'); // ID Template Dokumen
        $this->templateForbela = env('GOOGLE_DOC_TEMPLATE_FORBELA'); // ID Template Forbela
        $this->templateDiplomaTigaAnalisKesehatan = env('GOOGLE_DOC_TEMPLATE_DIPLOMA_TIGA_ANALIS_KESEHATAN');
        $this->templateDiplomaTigaFarmasi = env('GOOGLE_DOC_TEMPLATE_DIPLOMA_TIGA_FARMASI');
        $this->templateIjazah = env('GOOGLE_DOC_TEMPLATE_IJAZAH');
        $this->folderId = env('GOOGLE_DRIVE_FOLDER_ID');
        $this->folderForbela = env('GOOGLE_DRIVE_FOLDER_FORBELA');
        $this->folderDversi = env('GOOGLE_DRIVE_FOLDER_DVERSI');
    }

    /**
     * Upload file ke Google Drive
     *
     * @param \Illuminate\Http\UploadedFile $uploadedFile
     * @param string $fileName
     * @param string $folderId
     * @param bool $makePublic
     * @return array|null ['id' => fileId, 'url' => publicUrl]
     */
    public function uploadFileToDrive($uploadedFile, $fileName, $folderId, $makePublic = false)
    {
        try {
            $fileMetadata = new DriveFile([
                'name' => $fileName,
                'parents' => [$folderId],
            ]);

            $content = file_get_contents($uploadedFile->getRealPath());

            $file = $this->driveService->files->create($fileMetadata, [
                'data' => $content,
                'mimeType' => $uploadedFile->getClientMimeType(),
                'uploadType' => 'multipart',
                'fields' => 'id',
            ]);

            $fileId = $file->id;
            $url = null;

            if ($makePublic) {
                $permission = new Permission([
                    'type' => 'anyone',
                    'role' => 'reader',
                ]);
                $this->driveService->permissions->create($fileId, $permission);
                $url = "https://drive.google.com/file/d/{$fileId}/preview";
            }

            return [
                'id' => $fileId,
                'url' => $url,
            ];
        } catch (Exception $e) {
            report($e);
            return null;
        }
    }

    public function exportPdf($documentId, $prodi, $periode_lulus, $mahasiswa)
    {
        try {
            // Ekspor file dari Google Drive sebagai PDF
            $response = $this->driveService->files->export($documentId, 'application/pdf', [
                'alt' => 'media'
            ]);

            // Pastikan nama folder valid dan aman
            $prodi = str_replace(['/', '\\', ' '], '_', $prodi); // Hindari karakter yang bisa mengganggu path
            $periode_lulus = str_replace(['/', '\\', ' '], '_', $periode_lulus);

            // Tentukan path penyimpanan
            $folderPath = "dversi/{$prodi}/{$periode_lulus}";
            $fileName = "Ijazah--{$mahasiswa}.pdf";
            $filePath = "{$folderPath}/{$fileName}";

            // Pastikan folder ada
            Storage::disk('public')->makeDirectory($folderPath);

            // Simpan PDF ke storage Laravel
            Storage::disk('public')->put($filePath, $response->getBody());

            $fileMetadata = new DriveFile([
                'name' => $fileName,
                'parents' => [$this->folderDversi] // Folder tujuan di Google Drive
            ]);

            $content = file_get_contents(Storage::disk('public')->path($filePath));

            $file = $this->driveService->files->create($fileMetadata, [
                'data' => $content,
                'mimeType' => 'application/pdf',
                'uploadType' => 'multipart',
                'fields' => 'id'
            ]);

            // Setel izin agar file bisa diakses publik
            $permission = new Permission();
            $permission->setType('anyone');
            $permission->setRole('reader');
            $this->driveService->permissions->create($file->id, $permission, ['fields' => 'id']);


            Log::info("Dokumen berhasil diekspor dan diunggah ke Google Drive: {$file->id}");

            Storage::disk('public')->delete($filePath);

            return "https://drive.google.com/file/d/{$file->id}/view"; // URL Google Drive

        } catch (Exception $e) {
            Log::error("Gagal mengekspor PDF: " . $e->getMessage());
            return null;
        }
    }

    public function removeWatermark($documentId)
    {
        try {
            $document = $this->docsService->documents->get($documentId);
            $headers = $document->getHeaders();

            $requests = [];

            // Loop melalui semua header dan hapus seluruhnya
            foreach ($headers as $headerId => $header) {
                $requests[] = [
                    'deleteHeader' => [
                        'headerId' => $headerId
                    ]
                ];
            }

            // Tambahkan kembali header kosong
            $requests[] = [
                'createHeader' => [
                    'type' => 'DEFAULT'
                ]
            ];

            $this->docsService->documents->batchUpdate($documentId, new \Google\Service\Docs\BatchUpdateDocumentRequest([
                'requests' => $requests,
            ]));
            Log::info("Semua header berhasil dihapus dari dokumen.");
        } catch (\Exception $e) {
            Log::error("Gagal menghapus watermark: " . $e->getMessage());
        }
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

    public function duplicateDocument($newTitle, $prodi)
    {
        // Buat salinan dokumen di Google Drive
        $copy = new DriveFile([
            'name' => $newTitle, // Nama dokumen hasil duplikasi
            'parents' => [$this->folderId],
        ]);
        if ($prodi == "DIPLOMA TIGA ANALIS KESEHATAN") {
            $file = $this->driveService->files->copy($this->templateDiplomaTigaAnalisKesehatan, $copy);
        } elseif ($prodi == "DIPLOMA TIGA FARMASI") {
            $file = $this->driveService->files->copy($this->templateDiplomaTigaFarmasi, $copy);
        } else {
            $file = $this->driveService->files->copy($this->templateId, $copy);
        }

        return $file->id; // ID dokumen yang baru dibuat
    }
    public function duplicateForbela($newTitle)
    {
        // Buat salinan dokumen di Google Drive
        $copy = new DriveFile([
            'name' => $newTitle, // Nama dokumen hasil duplikasi
            'parents' => [$this->folderForbela],
        ]);
        $file = $this->driveService->files->copy($this->templateForbela, $copy);

        return $file->id; // ID dokumen yang baru dibuat
    }
    public function ijazah($newTitle)
    {
        // Buat salinan dokumen di Google Drive
        $copy = new DriveFile([
            'name' => $newTitle, // Nama dokumen hasil duplikasi
            'parents' => [$this->folderDversi],
        ]);

        $file = $this->driveService->files->copy($this->templateIjazah, $copy);

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

    public function replaceForbela($documentId, $replacements)
    {
        $requests = [];

        foreach ($replacements as $placeholder => $value) {
            $placeholderText = "{{" . $placeholder . "}}";

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

        $this->docsService->documents->batchUpdate($documentId, new \Google\Service\Docs\BatchUpdateDocumentRequest([
            'requests' => $requests,
        ]));
    }

    public function replaceIjazah($documentId, $replacements)
    {
        $requests = []; // Inisialisasi array kosong

        foreach ($replacements as $placeholder => $value) {
            $placeholderText = "{{" . $placeholder . "}}";
            Log::info("Mengganti placeholder $placeholderText dengan $value");

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

        // Pastikan ada request yang dikirim untuk menghindari error
        if (!empty($requests)) {
            $this->docsService->documents->batchUpdate($documentId, new \Google\Service\Docs\BatchUpdateDocumentRequest([
                'requests' => $requests,
            ]));
            Log::info("Update teks berhasil pada dokumen ID: $documentId");
        } else {
            Log::warning("Tidak ada teks yang perlu diganti dalam dokumen ID: $documentId");
        }
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
