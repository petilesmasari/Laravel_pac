@extends('layouts.layouts')

@section('title', 'Struktur Organisasi')

@section('content')
<section id="struktur" style="margin-top: 50px">
    <div class="container py-5">
        <div class="header text-center py-4">
            <h2>Susunan Pengurus</h2>
        </div>

        <!-- Ketua Umum -->
        <div class="row mb-5 d-flex align-items-stretch">
            <div class="col-md-5 text-center">
                <img src="{{ asset('assets/images/ketua-pac.jpeg') }}" class="img-fluid rounded" alt="Ketua Umum">
            </div>
            <div class="col-md-7 h-100">
                <h5 class="text-muted">Ketua</h5>
                <h3 class="text-danger fw-bold">Hamdani, SE</h3>
                <p class="mt-3">
                    HAMDANI, SE. yang dikenal dengan Coach Danz merupakan pendiri sekaligus pelatih di Pontianak Archery Club (PAC). Klub panahan yang dirintisnya bersama rekan-rekan pecinta panahan di bumi khatulistiwa. PAC merupakan salah satu klub "pionir" yang menjadi inspirasi lahirnya klub-klub panahan di Kalimantan Barat.
                    Melalui PAC, Coach Danz aktif menggelar archery training dan membuka kelas-kelas panahan untuk masyarakat. Alhamdulillah berkat sentuhan tangan dinginnya, Coach Danz banyak mencetak atlet-atlet muda potensial. Dari yang juara klub, daerah hingga berhasil menjadi atlet panahan nasional yang berjuang untuk Indonesia.<p>
                <p>
                    Sekarang, Coach Danz tercatat sebagai pengurus Pengprov Perpani Kalimantan Barat periode 2022-2026 bidang pelatihan dan teknik. Dia juga aktif menjadi pengurus KONI Kota Pontianak sebagai Kabid Pendidikan dan Penataran. Salah satu tugasnya adalah menyiapkan kapasitas tenaga keolahragaan di Kota Pontianak.
                <p>
            </div>
        </div>

        <div class="bg-white p-4 rounded shadow-sm">
            <h5 class="mb-3 fw-bold">Susunan Pengurus</h5>

            <p class="fw-bold mb-1">Pembina</p>
            <p>H. Syarief Abdullah Alkadrie, SH, MH</p> 

            <p class="fw-bold mb-1">Pengawas</p>
            <p>Viryan Aziz, SE, MM</p>

            <p class="fw-bold mb-1">Ketua</p>
            <p>Hamdani, SE</p>

            <p class="fw-bold mb-1">Sekretaris</p>
            <p>Asmirno</p>

            <p class="fw-bold mb-1">Bendahara</p>
            <p>Jumadi</p>

            <p class="fw-bold mb-1">Bidang Operasional</p>
            <ol class="mb-3">
                <li>Agus Rianto</li>
                <li>Suwadi</li>
            </ol>

            <p class="fw-bold mb-1">Bidang Pelatihan, Kompetisi dan Event</p>
            <ol class="mb-3">
                <li>David Teguh M, S.ET</li>
                <li>Imam W, S.Pd</li>
                <li>M. Rudi, SE</li>
            </ol>

            <p class="fw-bold mb-1">Bidang Advokasi</p>
            <p>Muhammad Vicky Syuriansyah, SH</p>

            <p class="fw-bold mb-1">Bidang Humas dan Media</p>
            <ol class="mb-3">
                <li>Rahmat Syaiful</li>
                <li>Qurrotul Aini</li>
            </ol>
    </div>
</section>
@endsection
