<x-layout>
<form action="{{route('sheet.store')}}" method="post">
  @csrf()
  <div class="mb-3">
    <div class="row">
        <div class="col-md-4">
            <label for="kategori_arsip" class="form-label">Kategori Arsip</label>
            <select class="form-select" name="kategori_arsip" aria-label="Default select example">
                <option selected>Pilih Kategori...</option>
                <option value="Arsip Aktif">Arsip Aktif</option>
                <option value="Arsip In-Aktif">Arsip In-aktif</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="kode_klasifikasi" class="form-label">Kode Klasifikasi</label>
                <input type="text" class="form-control" name="kode_klasifikasi" id="kode_klasifikasi" aria-describedby="">
                <div id="" class="form-text">
                   
                </div>
        </div>
        <div class="col-md-4">
            <label for="uraian_informasi_arsip" class="form-label">Uraian Informasi Arsip</label>
                <input type="text" class="form-control" name="uraian_informasi_arsip" id="uraian_informasi_arsip" aria-describedby="">
                <div id="" class="form-text">
                   
                </div>
        </div>
        <div class="col-md-4">
            <label for="kurun_waktu" class="form-label">Kurun Waktu</label>
                <input type="number" class="form-control" name="kurun_waktu" id="kurun_waktu" aria-describedby="">
                <div id="" class="form-text">
                   
                </div>
        </div>
        <div class="col-md-4">
            <label for="tanggal_arsip" class="form-label">Tanggal Arsip</label>
                <input type="date" class="form-control" name="tanggal_arsip" id="tanggal_arsip" aria-describedby="">
                <div id="" class="form-text">
                   
                </div>
        </div>
        <div class="col-md-4">
            <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" name="jumlah" id="jumlah" aria-describedby="">
                <div id="" class="form-text">
                   
                </div>
        </div>
        <div class="col-md-4">
            <label for="keterangan" class="form-label">Keterangan Arsip</label>
            <select class="form-select" name="keterangan" aria-label="Default select example">
                <option selected>Pilih Keterangan...</option>
                <option value="Asli">Asli</option>
                <option value="Copy, Asli">Copy, Asli</option>
                <option value="Copy">Copy</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="unggah_file_arsip" class="form-label">Unggah File Arsip</label>
                <input type="text" class="form-control" name="unggah_file_arsip" id="unggah_file_arsip" aria-describedby="">
                <div id="" class="form-text">
                   
                </div>
        </div>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</x-layout>