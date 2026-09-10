<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    private array $dataMatakuliah = [
        ['kode' => 'TK245009', 'nama' => 'Pemrograman Web II', 'sks' => 2],
        ['kode' => 'TK240008', 'nama' => 'Manajemen Proyek', 'sks' => 2],
        ['kode' => 'TK245004', 'nama' => 'Internet of Things', 'sks' => 3],
        ['kode' => 'TK245007', 'nama' => 'Metode Numerik', 'sks' => 2],
        ['kode' => 'TK245006', 'nama' => 'Etika Profesi', 'sks' => 2],
    ];

    public function index(Request $request)
    {
        $kataKunci = $request->query('q', '');
        $matakuliah = $this->dataMatakuliah;

        if (!empty($kataKunci)) {
            $matakuliah = array_filter($matakuliah, function ($item) use ($kataKunci) {
                return stripos($item['nama'], $kataKunci) !== false ||
                       stripos($item['kode'], $kataKunci) !== false;
            });
        }

        return view('matakuliah.index', [
            'daftarMatakuliah' => $matakuliah,
            'kataKunci'        => $kataKunci,
        ]);
    }

    public function show(string $kode)
    {
        $matakuliah = collect($this->dataMatakuliah)->firstWhere('kode', $kode);

        if (!$matakuliah) {
            abort(404, 'Matakuliah tidak ditemukan');
        }

        return view('matakuliah.show', ['matakuliah' => $matakuliah]);
    }
}