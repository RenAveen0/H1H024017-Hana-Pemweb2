@extends('layouts.app')

@section('judul', 'Detail Mahasiswa')

@section('konten')
<div class="card mb-4">
    <div class="card-header">
        <h5>Biodata Mahasiswa</h5>
    </div>
    <div class="card-body">
        <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
        <p><strong>Nama:</strong> {{ $mahasiswa->nama }}</p>
        <p><strong>Program Studi:</strong> {{ $mahasiswa->programStudi->nama }}</p>
        <p><strong>IPK:</strong> {{ $mahasiswa->ipk }}</p>
    </div>
</div>

<h4>Daftar Matakuliah yang Diambil</h4>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($mahasiswa->matakuliah as $mk)
        <tr>
            <td>{{ $mk->kode }}</td>
            <td>{{ $mk->nama }}</td>
            <td>{{ $mk->sks }}</td>
            <td>{{ $mk->semester }}</td>
            <td><span class="badge bg-primary">{{ $mk->pivot->nilai ?? '-' }}</span></td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Belum ada matakuliah yang diambil.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<a href="{{ route('mahasiswa.data') }}" class="btn btn-secondary">Kembali</a>
@endsection