<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $daftarMahasiswa = [
            ['nim' => 'H1H024017', 'nama' => 'Hana Nur Fathiyyah', 'angkatan' => 2024],
            ['nim' => 'H1A123001', 'nama' => 'Andi Prasetyo', 'angkatan' => 2023],
            ['nim' => 'H1A123002', 'nama' => 'Bunga Lestari', 'angkatan' => 2023],
        ];

        return view('mahasiswa.index', ['daftarMahasiswa' => $daftarMahasiswa]);
    }

    public function show(string $nim)
    {
        return view('mahasiswa.show', ['nim' => $nim]);
    }

    // Langkah 10: Membaca Query String dari Request
    public function cari(Request $request)
    {
        $katakunci = $request->query('q', '');
        return response()->json([
            'kata_kunci' => $katakunci,
            'metode'     => $request->method(),
            'path'       => $request->path(),
        ]);
    }
}