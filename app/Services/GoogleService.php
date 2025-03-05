<?php

namespace App\Services;

use Google\Client;
use Google\Service\Docs;
use Google\Service\Drive;
use Google\Service\Drive\DriveFile;
use Google\Service\Drive\Permission;
use Exception;

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
        $requests = [];

        foreach ($replacements as $placeholder => $value) {
            $requests[] = [
                'replaceAllText' => [
                    'containsText' => [
                        'text' => "{{" . $placeholder . "}}",
                        'matchCase' => true,
                    ],
                    'replaceText' => $value,
                ],
            ];
        }

        return $this->docsService->documents->batchUpdate($documentId, new \Google\Service\Docs\BatchUpdateDocumentRequest([
            'requests' => $requests,
        ]));
    }
}
