<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['title' => 'One Piece',      'type' => 'anime', 'genre' => 'adventure'],
            ['title' => 'Naruto',         'type' => 'anime', 'genre' => 'action'],
            ['title' => 'One Punch Man',  'type' => 'anime', 'genre' => 'comedy'],
            ['title' => 'Attack on Titan','type' => 'manga', 'genre' => 'dark fantasy'],
            ['title' => 'Death Note',     'type' => 'manga', 'genre' => 'thriller'],
        ];

        foreach ($data as $item) {
            Media::firstOrCreate(['title' => $item['title']], $item);
        }
    }
}