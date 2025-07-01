@extends('layouts.layouts')

@section('title', 'Best Skor')

@section('content')
<section style="margin-top: 80px">
    <div class="container py-5 col-lg-9">
        <h3 class="fw-bold mb-4">Best Skor Bulanan</h3>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Nama</th>
                    <th>Skor</th>
                    <th>File</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Juni 2025</td>
                    <td>Ahmad Fauzi</td>
                    <td>670</td>
                    <td><a href="{{ asset('files/skor-juni2025.pdf') }}" target="_blank">Download</a></td>
                </tr>
                <tr>
                    <td>Mei 2025</td>
                    <td>Siti Rahma</td>
                    <td>650</td>
                    <td><a href="{{ asset('files/skor-mei2025.pdf') }}" target="_blank">Download</a></td>
                </tr>
                <!-- Tambahkan data lainnya -->
            </tbody>
        </table>
    </div>
</section>
@endsection
