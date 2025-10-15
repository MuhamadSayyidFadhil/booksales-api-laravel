<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'name' => 'Fiksi',
            'description' => 'Buku dengan cerita rekaan yang tidak benar-benar terjadi.',
        ]);

        Genre::create([
            'name' => 'Non-Fiksi',
            'description' => 'Buku berdasarkan fakta dan informasi nyata.',
        ]);

        Genre::create([
            'name' => 'Motivasi',
            'description' => 'Buku yang memberikan inspirasi dan semangat hidup.',
        ]);
    }
}
