<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Laskar Pelangi',
            'description' => 'Kisah perjuangan anak-anak Belitung menuntut ilmu.',
            'price' => 75000,
            'stock' => 10,
            'cover_photo' => 'laskar_pelangi.jpg',
            'genre_id' => 1,
        ]);

        Book::create([
            'title' => 'Pulang',
            'description' => 'Petualangan seorang pemuda yang kembali ke desa kelahirannya.',
            'price' => 65000,
            'stock' => 8,
            'cover_photo' => 'pulang.jpg',
            'genre_id' => 1,
        ]);

        Book::create([
            'title' => 'Negeri 5 Menara',
            'description' => 'Perjalanan inspiratif enam santri dalam menuntut ilmu di pesantren.',
            'price' => 60000,
            'stock' => 12,
            'cover_photo' => 'negeri5menara.jpg',
            'genre_id' => 2,
        ]);

        Book::create([
            'title' => 'Bumi Manusia',
            'description' => 'Karya klasik Pramoedya tentang perjuangan dan cinta di masa kolonial.',
            'price' => 85000,
            'stock' => 5,
            'cover_photo' => 'bumi_manusia.jpg',
            'genre_id' => 2,
        ]);

        Book::create([
            'title' => 'Dilan 1990',
            'description' => 'Kisah cinta remaja antara Dilan dan Milea di Bandung.',
            'price' => 55000,
            'stock' => 15,
            'cover_photo' => 'dilan1990.jpg',
            'genre_id' => 3,
        ]);
    }
}
