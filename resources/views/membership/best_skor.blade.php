@extends('layouts.layouts')

@section('title', 'Best Skor')

@section('content')
<section id="skor" style="margin-top: 50px">
    <div class="container py-5 col-lg-9">
        <!-- Baris atas: Download PDF & Dropdown -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <a href="{{ asset('files/skor-mei2025.pdf') }}" class="text-decoration-underline" target="_blank">Download pdf</a>
            </div>
            <div>
                <select class="form-select w-auto" onchange="window.location.href=this.value;">
                    <option selected>Mei</option>
                    <option value="/skor/juni">Juni</option>
                    <option value="/skor/juli">Juli</option>
                    <option value="/skor/agustus">Agustus</option>
                    <!-- Tambahkan bulan lain sesuai kebutuhan -->
                </select>
            </div>
        </div>

        <!-- Judul -->
        <div class="text-center mb-4">
            <h3 class="fw-bold">SKOR BULAN MEI</h3>
        </div>

        <!-- Tabel Skor -->
        <table class="table table-bordered text-center">
            <thead class="table-secondary">
                <tr>
                    <th>Nama</th>
                    <th>Skor</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Annisa Aulia J</td><td>455</td></tr>
                <tr><td>Immanuel Kote</td><td>400</td></tr>
                <tr><td>Sanjaya</td><td>389</td></tr>
                <tr><td>Berta</td><td>370</td></tr>
                @for ($i = 0; $i < 13; $i++)
                    <tr><td>Umi Kalima</td><td>359</td></tr>
                @endfor
            </tbody>
        </table>
    </div>
</section>
@endsection
