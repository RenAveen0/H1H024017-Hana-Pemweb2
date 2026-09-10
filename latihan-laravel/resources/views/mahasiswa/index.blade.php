@extends('layouts.app')

@section('judul', 'Daftar Mahasiswa')

@section('konten')
    <h1 class="h3 mb-3">Daftar Mahasiswa</h1>

    <x-kartu-info judul="Informasi Praktikum">
        Data pada halaman ini masih berupa array statis. Pada modul berikutnya data akan diambil dari basis data.
    </x-kartu-info>

    <table class="table table-bordered bg-white shadow-sm mt-3">
        <thead class="table-dark">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Angkatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($daftarMahasiswa as $mahasiswa)
                <tr>
                    <td>{{ $mahasiswa['nim'] }}</td>
                    <td>{{ $mahasiswa['nama'] }}</td>
                    <td>{{ $mahasiswa['angkatan'] }}</td>
                    <td>
                        <a href="{{ route('mahasiswa.show', $mahasiswa['nim']) }}" class="btn btn-sm btn-primary">Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Data belum tersedia</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection