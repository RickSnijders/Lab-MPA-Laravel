<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Genre::create([
            'genre' => 'Pop',
        ]);
        Genre::create([
            'genre' => 'Hip-Hop',
        ]);
        Genre::create([
            'genre' => 'Rock',
        ]);
        Genre::create([
            'genre' => 'Dance',
        ]);
    }
}
