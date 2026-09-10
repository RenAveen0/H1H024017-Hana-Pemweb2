# Data Praktikan
* **Nama:** Hana Nur Fathiyyah
* **NIM:** H1H024017
* **Program Studi:** S1 Teknik Komputer
* **Fakultas / Universitas:** Fakultas Teknik / Universitas Jenderal Soedirman
* **Mata Kuliah:** Praktikum Pemrograman Web II
* **Tahun Akademik:** 2026/2027

## Daftar Isi Modul
1. [Modul 1](#Modul-1-Penyiapan-Lingkungan-Pengembangan-Web-Modern)
2. [Modul 2]()

# Modul 1 - Penyiapan Lingkungan Pengembangan Web Modern

## Daftar Isi Modul 1
1. [Prasyarat Perangkat Lunak](#1-prasyarat-perangkat-lunak)
2. [Struktur Repositori](#2-struktur-repositori)
3. [Panduan Menjalankan Proyek](#3-panduan-menjalankan-proyek)
   - [Proyek Laravel 13](#a-latihan-laravel)
   - [Proyek Fiber v3](#b-latihan-fiber)
4. [Hasil Tugas Praktikum](#4-hasil-tugas-praktikum)
   - [Tugas 1: Endpoint GET /api/mahasiswa (Fiber)](#tugas-1-endpoint-get-apimahasiswa-fiber)
   - [Tugas 2: Modifikasi Halaman Depan (Laravel)](#tugas-2-modifikasi-halaman-depan-laravel)
5. [Tabel Perbandingan Laravel vs Fiber](#5-tabel-perbandingan-laravel-vs-fiber)
6. [Jawaban Pertanyaan Pembahasan](#6-jawaban-pertanyaan-pembahasan)

## 1. Prasyarat Perangkat Lunak
Pastikan perangkat lunak berikut telah terpasang dan terkonfigurasi pada sistem:
- **PHP:** >= 8.4 (beserta ekstensi `mbstring`, `openssl`, `pdo_mysql`, `curl`, dll.)
- **Composer:** >= 2.7+
- **Go / Golang:** >= 1.23+
- **Git:** >= 2.40+
- **Editor Kode:** Visual Studio Code
- **Pengujian API / Peramban:** Google Chrome / Edge / Postman / Bruno / cURL

## 2. Struktur Repositori
```text
H1H024017-Hana-Pemweb2/
├── Pertemuan-1/
│   ├── latihan-laravel/        # Proyek dasar Laravel 13
│   │   ├── app/
│   │   ├── bootstrap/app.php
│   │   ├── resources/views/
│   │   │   └── welcome.blade.php
│   │   ├── routes/
│   │   │   └── web.php
│   │   └── composer.json
│   │
│   └── latihan-fiber/          # Proyek dasar Fiber v3
│       ├── .gitignore
│       ├── go.mod
│       ├── go.sum
│       └── main.go
└── README.md
```

## 3. Panduan Menjalankan Proyek

### A. Latihan Laravel

1. Masuk ke folder proyek:
```bash
cd Pertemuan-1/latihan-laravel

```

2. Jalankan server pengembangan bawaan:
```bash
php artisan serve

```

3. Buka peramban di alamat: `http://127.0.0.1:8000`

### B. Latihan Fiber

1. Masuk ke folder proyek:
```bash
cd Pertemuan-1/latihan-fiber

```

2. Jalankan server Go:
```bash
go run main.go

```

3. Akses endpoint melalui peramban atau REST client:
* Root: `http://localhost:3000/`
* Info Sistem: `http://localhost:3000/api/info`
* Data Mahasiswa: `http://localhost:3000/api/mahasiswa`

## 4. Hasil Tugas Praktikum

### Tugas 1: Endpoint `GET /api/mahasiswa` (Fiber)

Endpoint mengembalikan respons JSON berupa identitas praktikan:

* **URL:** `http://localhost:3000/api/mahasiswa`
* **Method:** `GET`
* **Respons JSON:**
```json
{
  "nim": "H1H024017",
  "nama": "Hana Nur Fathiyyah",
  "prodi": "Teknik Komputer"
}

```

### Tugas 2: Modifikasi Halaman Depan (Laravel)

Berkas `resources/views/welcome.blade.php` dimodifikasi agar menampilkan kartu profil identitas praktikan saat rute root (`/`) diakses di peramban.

## 5. Tabel Perbandingan Laravel vs Fiber

| Aspek | Laravel 13 (PHP) | Fiber v3 (Go) |
| --- | --- | --- |
| **Alat Pengelola Paket** | Menggunakan **Composer**; paket dependensi diunduh ke dalam folder lokal `vendor`. | Menggunakan **Go Modules (`go get`)**; dependensi tercatat di `go.mod` dan `go.sum`. |
| **Ukuran & Kompleksitas Proyek** | Berukuran besar karena mengusung ekosistem MVC bawaan yang lengkap (*full-featured*). | Sangat ringan dan minimalis (*microframework*), cocok untuk microservices. |
| **Model Eksekusi / Runtime** | Berbasis bahasa skrip terinterpretasi (PHP) yang memerlukan web server runtime. | Berbasis bahasa terkompilasi (Go) yang menghasilkan berkas biner mandiri (*executable*). |
| **Konfigurasi Port Default** | Standar port pengembangan otomatis diset ke port **8000** (`php artisan serve`). | Port diatur secara manual dan eksplisit pada berkas kode program (`app.Listen(":3000")`). |


## 6. Jawaban Pertanyaan Pembahasan

### 1. Mengapa folder `vendor` pada Laravel dan berkas binary Go tidak diikutsertakan dalam repositori Git?

* **Folder `vendor`:** Memiliki ukuran berkas yang sangat besar dan memuat ribuan dependensi pihak ketiga. Seluruh daftar paket sudah tercatat di `composer.json` dan dapat diunduh ulang sewaktu-waktu melalui perintah `composer install`.
* **Berkas binary Go:** Berukuran besar serta bersifat terikat platform (*platform-dependent*), di mana berkas biner hasil kompilasi Windows (`.exe`) tidak dapat dieksekusi pada Linux atau macOS. Berkas biner dapat dibuat kembali di lingkungan target menggunakan perintah `go build`.

### 2. Apa fungsi berkas `composer.json` dan `go.mod`, serta apa persamaan keduanya?

* **Fungsi `composer.json`:** Manifes konfigurasi dependensi PHP untuk mencatat versi modul, pustaka eksternal yang dibutuhkan, dan aturan *autoloading* PSR-4.
* **Fungsi `go.mod`:** Manifes modul Go untuk mendefinisikan *module path*, kompatibilitas versi Go, serta daftar dependensi pihak ketiga beserta versinya.
* **Persamaan:** Keduanya berperan sebagai **manajer manifes dependensi** (*dependency manifest*) yang menjamin konsistensi versi pustaka saat proyek dieksekusi di komputer pengembang lain (*reproducibility*).

### 3. Jelaskan perbedaan port 8000 pada Laravel dan port 3000 pada Fiber dalam konteks praktikum ini.

* **Port 8000:** Port bawaan (*default*) yang dialokasikan oleh server pengembangan Laravel saat menjalankan perintah `php artisan serve`.
* **Port 3000:** Port kustom yang ditentukan secara eksplisit pada kode sumber aplikasi Fiber melalui fungsi `app.Listen(":3000")`.
* **Konteks Praktikum:** Pemisahan nomor port bertujuan agar server backend Laravel dan server backend Fiber dapat dijalankan secara bersamaan (*simultan*) pada lingkungan lokal (*localhost*) tanpa memicu bentrok port (*port collision*).