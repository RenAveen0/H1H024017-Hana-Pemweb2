@extends('layouts.app')
@section('judul', 'Top 10 Mahasiswa Teknik Komputer')
@section('konten')
<h2 class="mb-4">Top 10 Mahasiswa Teknik Komputer (IPK Tertinggi)</h2>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>IPK</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($topMahasiswaTK as $mhs)
        <tr>
            <td>{{ $mhs->nim }}</td>
            <td>{{ $mhs->nama }}</td>
            <td>{{ $mhs->programStudi->nama }}</td>
            <td><span class="badge bg-success">{{ $mhs->ipk }}</span></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection