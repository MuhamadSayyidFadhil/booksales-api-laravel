<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        Author::create([
            'name' => 'Andrea Hirata',
            'bio' => 'Penulis novel terkenal asal Indonesia, pencipta Laskar Pelangi.',
            'photo' => 'andrea_hirata.jpg',
        ]);

        Author::create([
            'name' => 'Tere Liye',
            'bio' => 'Penulis novel dan buku motivasi populer di Indonesia.',
            'photo' => 'tere_liye.jpg',
        ]);

        Author::create([
            'name' => 'Dewi Lestari',
            'bio' => 'Penulis dan musisi yang dikenal dengan seri Supernova.',
            'photo' => 'dewi_lestari.jpg',
        ]);

        Author::create([
            'name' => 'Habiburrahman El Shirazy',
            'bio' => 'Penulis novel religi seperti Ayat-Ayat Cinta.',
            'photo' => 'habiburrahman.jpg',
        ]);

        Author::create([
            'name' => 'Ahmad Fuadi',
            'bio' => 'Penulis novel inspiratif Negeri 5 Menara.',
            'photo' => 'ahmad_fuadi.jpg',
        ]);
    }
}
