<?php

namespace App\Http\Controllers;

use App\Services\GoogleSheetService;
use App\Services\GoogleDriveService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GoogleSheetController extends Controller
{
    protected $sheet;

    public function __construct(GoogleSheetService $sheet)
    {
        $this->sheet = $sheet;
    }

   public function index()
{
    $rows = $this->sheet->readSheet();
    return view('sheet.index', compact('rows'));
}

    public function uploadFile(){

    }

  public function store(Request $request, GoogleDriveService $drive)
{
    $kategori_arsip = $request->kategori_arsip;
    $kode_klasifikasi = $request->kode_klasifikasi;
    $uraian_informasi_arsip = $request->uraian_informasi_arsip;
    $kurun_waktu = $request->kurun_waktu;
    $tanggal_arsip = $request->tanggal_arsip;
    $jumlah = $request->jumlah;
    $keterangan = $request->keterangan;
    $prefix = "ARS-KESBANGPOL-";
    $unique = Str::random(12);
    $code = $prefix.$unique;

   

   if ($request->hasFile('unggah_file_arsip')) {
        $file = $request->file('unggah_file_arsip');
        $uploadedFile = $drive->uploadFile(
            $file->getPathname(),
            $file->getClientOriginalName(),
            $file->getMimeType()
        );

        $linkDrive = $uploadedFile->webViewLink; 
    }

    $this->sheet->appendRow('Form_Responses 1!A1:K', [
            date('m/d/Y'),
            $code,
            $kategori_arsip,
            $kode_klasifikasi,
            $uraian_informasi_arsip,
            $kurun_waktu,
            $tanggal_arsip,
            $jumlah,
            $keterangan,
            $linkDrive ?? ''
        ]);

        return response()->json(['status' => 'Row Added']);
}

    public function add()
    {
       return view('sheet.create');
    }

    public function simpan()
    {
        $this->sheet->appendRow('Form_Responses 1!A1:K', [
            date('m/d/Y'),
            '999',
            'Arsip Baru',
            '001',
            'Coba Input dari Laravel',
            '2025',
            now()->format('m/d/Y'),
            '1',
            'Copy',
            'https://example.com'
        ]);

        return response()->json(['status' => 'Row Added']);
    }
}
