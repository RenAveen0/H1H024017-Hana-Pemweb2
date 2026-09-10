@extends('layouts.app')

@section('judul', 'Detail Matakuliah')

@section('konten')
    <h1 class="h3 mb-4">Detail Informasi Matakuliah</h1>

    <div class="card shadow-sm border-0" style="max-width: 500px;">
        <div class="card-body">
            <h5 class="card-title text-primary">{{ $matakuliah['nama'] }}</h5>
            <h6 class="card-subtitle mb-3 text-muted">Kode: {{ $matakuliah['kode'] }}</h6>
            <p class="card-text">
                Beban Satuan Kredit Semester: <x-badge-sks :sks="$matakuliah['sks']" />
            </p>
            <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
        </div>
    </div>
@endsection