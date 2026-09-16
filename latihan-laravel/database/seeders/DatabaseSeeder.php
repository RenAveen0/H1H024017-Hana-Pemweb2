<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProgramStudiSeeder::class,
            MatakuliahSeeder::class,
        ]);

        Mahasiswa::factory()->count(30)->create()->each(function ($mahasiswa) {
            $matakuliahIds = Matakuliah::inRandomOrder()->take(rand(2, 4))->pluck('id');
            foreach ($matakuliahIds as $mkId) {
                $mahasiswa->matakuliah()->attach($mkId, [
                    'nilai' => collect(['A', 'B+', 'B', 'C+', 'C'])->random(),
                ]);
            }
        });
    }
}