<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    private $genres = [
        [
            'name' => 'Fiksi',
            'description' => 'Buku dengan cerita rekaan yang tidak benar-benar terjadi.',
        ],
        [
            'name' => 'Non-Fiksi',
            'description' => 'Buku berdasarkan fakta dan informasi nyata.',
        ],
        [
            'name' => 'Motivasi',
            'description' => 'Buku yang memberikan inspirasi dan semangat hidup.',
        ],
        [
            'name' => 'Komik',
            'description' => 'Buku bergambar yang menceritakan kisah melalui ilustrasi.',
        ],
        [
            'name' => 'Sains',
            'description' => 'Buku yang membahas ilmu pengetahuan dan teknologi.',
        ],
    ];

    public function getGenres()
    {
        return $this->genres;
    }
}
