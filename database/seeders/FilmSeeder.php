<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Film;

class FilmSeeder extends Seeder
{
    public function run(): void
    {
        $films = [
            ['title' => 'Inception', 'status' => 'published', 'link' => 'https://example.com/inception.jpg'],
            ['title' => 'The Dark Knight', 'status' => 'published', 'link' => 'https://example.com/dark-knight.jpg'],
            ['title' => 'Interstellar', 'status' => 'draft', 'link' => 'https://example.com/interstellar.jpg'],
        ];

        foreach ($films as $film) {
            Film::create($film);
        }
    }
}

