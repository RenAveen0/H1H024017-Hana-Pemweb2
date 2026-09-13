# Data Praktikan
* **Nama:** Hana Nur Fathiyyah
* **NIM:** H1H024017
* **Program Studi:** S1 Teknik Komputer
* **Fakultas / Universitas:** Fakultas Teknik / Universitas Jenderal Soedirman
* **Mata Kuliah:** Praktikum Pemrograman Web II
* **Tahun Akademik:** 2026/2027

## Daftar Isi Modul
1. [Modul 1](#modul-1---penyiapan-lingkungan-pengembangan-web-modern)
2. [Modul 2](#modul-2---fondasi-laravel-13-routing-controller-dan-blade)

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

---

# Modul 2 - Fondasi Laravel 13: Routing, Controller, dan Blade

## Daftar Isi Modul 2
1. [Deskripsi Singkat](#1-deskripsi-singkat)
2. [Struktur Berkas Proyek](#2-struktur-berkas-proyek)
3. [Panduan Menjalankan Proyek](#3-panduan-menjalankan-proyek)
4. [Daftar Endpoint dan Rute](#4-daftar-endpoint-dan-rute)
5. [Hasil Tugas Praktikum](#5-hasil-tugas-praktikum)
   - [Tugas 1 & 2: MatakuliahController dan View](#tugas-1--2-matakuliahcontroller-dan-view)
   - [Tugas 3: Fitur Pencarian Query String](#tugas-3-fitur-pencarian-query-string)
   - [Tugas 4: Komponen Blade Badge SKS](#tugas-4-komponen-blade-badge-sks)
6. [Jawaban Pertanyaan Pembahasan](#6-jawaban-pertanyaan-pembahasan)

---

## 1. Deskripsi Singkat
Modul 2 berfokus pada penguasaan fondasi arsitektur MVC di Laravel 13, meliputi:
- Pendefinisian rute dasar, parameter URL dinamis, parameter opsional, dan validasi format parameter.
- Pemisahan logika aplikasi menggunakan Controller (`MahasiswaController` dan `MatakuliahController`).
- Templating engine Blade dengan konsep layout terpusat (`@extends`, `@section`, `@yield`).
- Pembuatan dan pemanfaatan komponen UI mandiri (`<x-kartu-info>` dan `<x-badge-sks>`).

---

## 2. Struktur Berkas Proyek
Penambahan berkas pada proyek Laravel selama Modul 2:
```text
latihan-laravel/
├── app/
│   ├── Http/Controllers/
│   │   ├── MahasiswaController.php     # Controller mahasiswa & query request
│   │   └── MatakuliahController.php    # Controller matakuliah & filter pencarian
│   └── View/Components/
│       ├── KartuInfo.php               # Komponen kartu info
│       └── BadgeSks.php                # Komponen badge SKS berkondisi
├── resources/views/
│   ├── components/
│   │   ├── kartu-info.blade.php
│   │   └── badge-sks.blade.php
│   ├── layouts/
│   │   └── app.blade.php               # Layout master (Bootstrap 5)
│   ├── mahasiswa/
│   │   ├── index.blade.php             # Tampilan daftar mahasiswa
│   │   └── show.blade.php              # Tampilan detail mahasiswa
│   └── matakuliah/
│       ├── index.blade.php             # Tampilan daftar matakuliah + form cari
│       └── show.blade.php              # Tampilan detail matakuliah
└── routes/
    └── web.php                         # Pendaftaran seluruh rute web
```

## 3. Panduan Menjalankan Proyek

1. Masuk ke folder proyek Laravel:
```bash
cd Pertemuan-1/latihan-laravel

```

2. Pastikan dependensi telah siap dan jalankan server pengembangan:
```bash
php artisan serve

```

3. Akses aplikasi melalui peramban di `http://127.0.0.1:8000`.

## 4. Daftar Endpoint dan Rute

| Metode | URI | Nama Rute | Action / Keterangan |
| --- | --- | --- | --- |
| `GET` | `/salam` | - | Mengembalikan string salam dasar |
| `GET` | `/mahasiswa/{nim}` | - | Parameter rute dinamis string |
| `GET` | `/matakuliah/{kode?}` | - | Parameter rute opsional |
| `GET` | `/semester/{angka}` | - | Parameter dengan validasi angka (`whereNumber`) |
| `GET` | `/data-mahasiswa` | `mahasiswa.index` | Menampilkan tabel daftar mahasiswa (Blade) |
| `GET` | `/data-mahasiswa/{nim}` | `mahasiswa.show` | Menampilkan detail data mahasiswa |
| `GET` | `/cari-mahasiswa` | `mahasiswa.cari` | Mengambil data query string (`?q=`) format JSON |
| `GET` | `/matakuliah-praktikum` | `matakuliah.index` | Daftar matakuliah & filter pencarian |
| `GET` | `/matakuliah-praktikum/{kode}` | `matakuliah.show` | Menampilkan detail informasi matakuliah |

## 5. Hasil Tugas Praktikum

### Tugas 1 & 2: MatakuliahController dan View

Membuat `MatakuliahController` yang mengelola data array minimal 5 matakuliah (kode, nama, SKS) dan menampilkannya menggunakan master layout `layouts/app.blade.php`:

* **Daftar Matakuliah:** `http://127.0.0.1:8000/matakuliah-praktikum`
* **Detail Matakuliah:** `http://127.0.0.1:8000/matakuliah-praktikum/{kode}`

### Tugas 3: Fitur Pencarian Query String

Halaman daftar matakuliah dilengkapi form pencarian sederhana berbasis query string `q`. Sistem menyaring data array berdasarkan kecocokan nama atau kode matakuliah:

* **Pengujian:** `http://127.0.0.1:8000/matakuliah-praktikum?q=Web`
* **Tampilan:** Form input tetap mempertahankan nilai kata kunci, menampilkan jumlah baris yang cocok, dan menyediakan tombol reset pencarian.

### Tugas 4: Komponen Blade Badge SKS

Membuat komponen `<x-badge-sks :sks="$mk['sks']" />` dengan aturan kondisional:

* **SKS < 3 (misal: 2 SKS):** Menggunakan badge hijau (`bg-success`).
* **SKS >= 3 (misal: 3 atau 4 SKS):** Menggunakan badge merah (`bg-danger`).

## 6. Jawaban Pertanyaan Pembahasan

### 1. Apa keuntungan penggunaan nama rute dibandingkan penulisan URL secara literal pada view?

* **Kemudahan Pemeliharaan (*Maintainability*):** Jika URI pada `routes/web.php` diganti sewaktu-waktu, seluruh tautan di berkas Blade tidak perlu diubah manual karena fungsi `route('nama.rute')` otomatis memperbarui tautan tujuan.
* **Abstraksi Penanganan Parameter:** Parameter dinamis dapat dikirimkan secara elegan melalui array asosiatif tanpa perlu menyambung string URL (*string concatenation*) yang rawan salah ketik.

### 2. Jelaskan perbedaan `{{ }}` dan `{!! !!}` pada Blade serta implikasi keamanannya.

* **`{{ $data }}`:** Otomatis menerapkan *HTML escaping* (menggunakan `htmlspecialchars`), mengubah karakter khusus seperti `<script>` menjadi entitas teks biasa. Berguna untuk **mencegah celah keamanan XSS (*Cross-Site Scripting*)**.
* **`{!! $data !!}`:** Mencetak variabel secara mentah (*raw HTML*) tanpa proses penyaringan karakter khusus.
* **Implikasi Keamanan:** Menggunakan `{!! !!}` pada input yang berasal dari pengguna sangat berbahaya karena penyerang dapat menyisipkan skrip berbahaya yang langsung dieksekusi oleh peramban klien.

### 3. Mengapa logika pengambilan data sebaiknya tidak diletakkan langsung pada berkas rute?

* **Prinsip Pemisahan Tanggung Jawab (*Separation of Concerns*):** Berkas rute hanya bertugas memetakan alur permintaan HTTP, sementara pemrosesan data adalah tanggung jawab Controller dan Model.
* **Kerapian & Keterbacaan Kode:** Menumpuk logika di berkas rute membuat file rute membengkak, sulit dibaca, dan sulit diuji (*untestable*).
* **Optimasi Performa:** Laravel memiliki fitur `php artisan route:cache` yang hanya bekerja maksimal apabila seluruh rute mengarah ke method pada kelas Controller, bukan fungsi *Closure* langsung di berkas rute.