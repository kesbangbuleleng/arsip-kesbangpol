<?php

namespace App\Services;

use Google_Client;
use Google_Service_Drive;
use Google_Service_Drive_DriveFile;

class GoogleDriveService
{
    protected $drive;

    public function __construct()
    {
        $client = new Google_Client();
        $client->setAuthConfig(storage_path('app/google-credentials.json'));
        $client->setScopes([
            \Google_Service_Sheets::SPREADSHEETS,
            Google_Service_Drive::DRIVE_FILE,
            Google_Service_Drive::DRIVE,
        ]);

        $this->drive = new Google_Service_Drive($client);
    }

    public function uploadFile($filePath, $fileName, $mimeType)
    {
        $folderId = '1TmbtZsIVugiNIpprEUVZu_M6hFlJoap2oH8RHjWeV51ZgJkbdIInZz6iCo12sr9HQWfO9sSv';
        $fileMetadata = new Google_Service_Drive_DriveFile([
            'name' => $fileName,
            'parents' => $folderId ? [$folderId] : []
        ]);

        $content = file_get_contents($filePath);

        $file = $this->drive->files->create($fileMetadata, [
            'data' => $content,
            'mimeType' => $mimeType,
            'uploadType' => 'multipart',
            'fields' => 'id, webViewLink, webContentLink'
        ]);

        return $file;
    }
}
