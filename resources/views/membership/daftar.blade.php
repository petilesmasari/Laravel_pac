@extends('layouts.layouts')

@section('title', 'Daftar Jadi Member')

@section('content')
<section style="margin-top: 80px">
    <div class="container py-5 col-lg-9">
        <h3 class="fw-bold mb-4">Formulir Daftar Member</h3>

        <form action="#" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama Lengkap / Panggilan</label>
                <input type="text" name="nama" class="form-control">
            </div>

            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="" disabled selected>-- Pilih --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Tempat / Tanggal Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" placeholder="Contoh: Jakarta, 1 Januari 2010">
            </div>

            <div class="mb-3">
                <label>Alamat Tempat Tinggal</label>
                <textarea name="alamat" class="form-control" rows="2"></textarea>
            </div>

            <div class="mb-3">
                <label>Pekerjaan / Sekolah</label>
                <input type="text" name="pekerjaan" class="form-control">
            </div>

            <div class="mb-3">
                <label>Nama Orangtua dan Kontak (Khusus Anak)</label>
                <input type="text" name="kontak_orangtua" class="form-control">
            </div>

            <div class="mb-3">
                <label>Nomor Telepon</label>
                <input type="text" name="telepon" class="form-control">
            </div>

            <div class="mb-3">
                <label>Pernah ikut latihan memanah?</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pernah_latihan" id="latihanYa" value="ya">
                    <label class="form-check-label" for="latihanYa">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pernah_latihan" id="latihanTidak" value="tidak">
                    <label class="form-check-label" for="latihanTidak">Tidak</label>
                </div>
            </div>

            <hr class="my-4">

            <h5 class="fw-bold">Pilihan Sesi</h5>

            <div class="mb-3">
                <label>Hari</label>
                <select name="hari" class="form-control">
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                </select>
            </div>

            <div class="mb-4">
                <label>Sesi</label>
                <select name="sesi" class="form-control">
                    <option value="Sesi 1 (07.00–09.00)">Sesi 1 (07.00–09.00)</option>
                    <option value="Sesi 2 (09.00–11.00)">Sesi 2 (09.00–11.00)</option>
                    <option value="Sesi 3 (15.30–17.30)">Sesi 3 (15.30–17.30)</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>
</section>
@endsection
