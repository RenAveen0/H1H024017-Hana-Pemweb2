<?php

namespace Database\Seeders;

use App\Models\Matakuliah;
use Illuminate\Database\Seeder;

class MatakuliahSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['kode' => 'TK101', 'nama' => 'Pemrograman Web II', 'sks' => 3, 'semester' => 4],
            ['kode' => 'TK102', 'nama' => 'Sistem Tertanam', 'sks' => 3, 'semester' => 4],
            ['kode' => 'TK103', 'nama' => 'Jaringan Komputer', 'sks' => 3, 'semester' => 3],
            ['kode' => 'TK104', 'nama' => 'Basis Data', 'sks' => 3, 'semester' => 2],
        ];

        foreach ($data as $item) {
            Matakuliah::create($item);
        }
    }
}