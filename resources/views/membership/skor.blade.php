@extends('layouts.layouts')

@section('content')
{{-- Best Skor --}}
<section id="berita" style="margin-top: 50px">
    <div class="container py-5">
        <div class="header text-center py-4">
            <h2>Best Skor Pontianak Archery Club</h2>
        </div>

                {{-- Header dan Dropdown Bulan --}}
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">Skor Bulan {{ \Carbon\Carbon::create(null, $bulan)->translatedFormat('F Y') }}</h4>

                    <form method="GET" action="{{ route('skorfrontend') }}">
                        <select name="bulan" class="form-select" onchange="this.form.submit()">
                            @foreach(range(1, 12) as $i)
                                <option value="{{ $i }}"
                                    {{ $bulan == $i ? 'selected' : '' }}>
                                    {{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>

                {{-- Tabel Skor --}}
                @if($skors->count())
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead style="background-color: #DC3545; color: white;">
                                <tr>
                                    <th>Nama</th>
                                    <th>Skor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($skors as $skor)
                                <tr>
                                    <td>{{ $skor->nama }}</td>
                                    <td>{{ $skor->skor }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-center">Belum ada skor untuk bulan ini.</p>
                @endif

            </div>
        </div>
    </div>
</section>
@endsection