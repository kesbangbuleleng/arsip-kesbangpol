<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GoogleSheetService;

class SheetController extends Controller
{
    protected $googleSheet;

    public function __construct(GoogleSheetService $googleSheet)
    {
        $this->googleSheet = $googleSheet;
    }

    /**
     * Menampilkan semua data arsip dari Google Sheet
     */
    public function index()
{
    $rows = $this->sheet->readSheet();
    return view('sheet', compact('rows'));
}

    /**
     * Tambahkan data baru ke Google Sheet
     */
    public function store(Request $request)
    {
        $data = [
            now()->format('m/d/Y H:i:s'),   // Timestamp otomatis
            $request->nomor_arsip,
            $request->kategori_arsip,
            $request->kode_klasifikasi,
            $request->uraian_informasi,
            $request->kurun_waktu,
            $request->tanggal_arsip,
            $request->jumlah,
            $request->keterangan,
            $request->pratinjau_arsip,
        ];

        // Append ke baris berikutnya di sheet
        $this->googleSheet->appendSheet('Form Responses 1!A1:J1', [$data]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan ke Google Sheet!');
    }
}
