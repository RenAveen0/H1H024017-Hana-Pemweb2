<?php

use Illuminate\Support\Facades\Route;

// Rute Dasar
Route::get('/salam', function () {
    return 'Selamat datang di Pemrograman Web II';
});

// Parameter Wajib dan Parameter Opsional
Route::get('/mahasiswa/{nim}', function (string $nim) {
    return 'Data mahasiswa dengan NIM ' . $nim;
});

Route::get('/matakuliah/{kode?}', function (?string $kode = null) {
    if ($kode === null) {
        return 'Menampilkan seluruh matakuliah';
    }
    return 'Menampilkan matakuliah kode ' . $kode;
});

// Membatasi Format Parameter (Hanya Angka)
Route::get('/semester/{angka}', function (int $angka) {
    return 'Semester ke-' . $angka;
})->whereNumber('angka');