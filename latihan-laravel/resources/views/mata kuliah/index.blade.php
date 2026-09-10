@extends('layouts.app')

@section('judul', 'Daftar Matakuliah')

@section('konten')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Daftar Matakuliah</h1>

        <form action="{{ route('matakuliah.index') }}" method="GET" class="d-flex">
            <input type="text" name="q" value="{{ $kataKunci }}" class="form-control me-2" placeholder="Cari kode atau nama...">
            <button type="submit" class="btn btn-primary">Cari</button>
            @if(!empty($kataKunci))
                <a href="{{ route('matakuliah.index') }}" class="btn btn-outline-secondary ms-2">Reset</a>
            @endif
        </form>
    </div>

    @if(!empty($kataKunci))
        <p class="text-muted">Menampilkan hasil pencarian untuk: <strong>"{{ $kataKunci }}"</strong></p>
    @endif

    <table class="table table-bordered table-striped bg-white shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>Kode</th>
                <th>Nama Matakuliah</th>
                <th>Beban SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($daftarMatakuliah as $mk)
                <tr>
                    <td class="fw-bold">{{ $mk['kode'] }}</td>
                    <td>{{ $mk['nama'] }}</td>
                    <td>
                        <x-badge-sks :sks="$mk['sks']" />
                    </td>
                    <td>
                        <a href="{{ route('matakuliah.show', $mk['kode']) }}" class="btn btn-sm btn-info text-white">Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-danger">Data matakuliah tidak ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection