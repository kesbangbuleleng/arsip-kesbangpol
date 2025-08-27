<?php

namespace App\Services;

use Google_Client;
use Google_Service_Sheets;

class GoogleSheetService
{
    protected $service;
    protected $spreadsheetId;

    public function __construct()
    {
        $client = new Google_Client();
        $client->setAuthConfig(storage_path('app/google-credentials.json'));
        $client->setScopes([
            Google_Service_Sheets::SPREADSHEETS,
            Google_Service_Sheets::DRIVE
        ]);

        $this->service = new Google_Service_Sheets($client);
        $this->spreadsheetId = config('services.google.spreadsheet_id');
    }

    public function readSheet($range = 'Form_Responses 1!A1:K')
    {
        $response = $this->service->spreadsheets_values->get($this->spreadsheetId, $range);
        return $response->getValues();
    }

    public function appendRow($range = 'Form_Responses 1!A1:K', $values = [])
    {
        $body = new \Google_Service_Sheets_ValueRange([
            'values' => [$values]
        ]);

        return $this->service->spreadsheets_values->append(
            $this->spreadsheetId,
            $range,
            $body,
            ['valueInputOption' => 'USER_ENTERED']
        );
    }
}
