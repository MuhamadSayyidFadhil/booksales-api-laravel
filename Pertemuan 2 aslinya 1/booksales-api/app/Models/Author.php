<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    private $authors = [
        [
            'name' => 'Tere Liye',
            'bio' => 'Seorang penulis asal Indonesia yang terkenal dengan karya fiksi bernuansa kehidupan dan moral.',
            'country' => 'Indonesia',
        ],
        [
            'name' => 'Mark Manson',
            'bio' => 'Penulis asal Amerika Serikat yang terkenal dengan buku pengembangan diri.',
            'country' => 'Amerika Serikat',
        ],
        [
            'name' => 'Masashi Kishimoto',
            'bio' => 'Mangaka asal Jepang yang dikenal sebagai pencipta serial Naruto.',
            'country' => 'Jepang',
        ],
        [
            'name' => 'Andrea Hirata',
            'bio' => 'Penulis Indonesia yang dikenal dengan novel Laskar Pelangi.',
            'country' => 'Indonesia',
        ],
        [
            'name' => 'Stephen Hawking',
            'bio' => 'Ilmuwan fisika teoretis dan penulis asal Inggris.',
            'country' => 'Inggris',
        ],
    ];

    public function getAuthors()
    {
        return $this->authors;
    }
}
