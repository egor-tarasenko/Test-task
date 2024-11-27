<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Film;
use App\Models\Genre;

class FilmGenreSeeder extends Seeder
{
    public function run(): void
    {
        $films = Film::all();
        $genres = Genre::all();

        foreach ($films as $film) {
            $film->genres()->attach(
                $genres->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}

