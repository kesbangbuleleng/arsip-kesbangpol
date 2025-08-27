<?php

namespace App\Http\Controllers;

use App\Services\GoogleSheetService;

class SpreadsheetController extends Controller
{
    public function index(GoogleSheetService $sheetService)
    {
        $spreadsheetId = "1KOcKPSxdBKHWjZteru20ZwZl9k67CDIdDZaj57z3ES8"; // ID Spreadsheet
        $range = "Sheet1!A1:J10"; // Range data

        $rows = $sheetService->readSheet($spreadsheetId, $range);

        return view('spreadsheet', compact('rows'));
    }
}
