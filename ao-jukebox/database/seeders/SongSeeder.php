<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Song;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('songs')->insert([
        //     'song_name' => Str::random(10),

        // ]);
        Song::create([
            'song_name' => 'RAPSTAR',
            'artist' => 'Polo G',
            'genre' => 'Hip-Hop',
            'img' => 'https://t2.genius.com/unsafe/220x0/https%3A%2F%2Fimages.genius.com%2Fbdb6bca42da6066ccd249cf19c003522.1000x1000x1.png',
            'duration' => '165',
        ]);
        Song::create([
            'song_name' => 'Astronaut In The Ocean',
            'artist' => 'Masked Wolf',
            'genre' => 'Hip-Hop',
            'img' => 'https://t2.genius.com/unsafe/220x220/https%3A%2F%2Fimages.genius.com%2Fb9349537b1b2771ddbf0630751fa61e3.1000x1000x1.jpg',
            'duration' => '132',
        ]);
        Song::create([
            'song_name' => 'Up',
            'artist' => 'Cardi B',
            'genre' => 'Hip-Hop',
            'img' => 'https://t2.genius.com/unsafe/220x220/https%3A%2F%2Fimages.genius.com%2F3698043a4ad2bb2bd13ae0b7e3552c66.1000x1000x1.png',
            'duration' => '156',
        ]);

        Song::create([
            'song_name' => 'good 4 u',
            'artist' => 'Olivia Rodrigo',
            'genre' => 'Pop',
            'img' => 'https://t2.genius.com/unsafe/220x220/https%3A%2F%2Fimages.genius.com%2Fd82b5cd3ea274ca4461f2c67c706b3b8.1000x1000x1.jpg',
            'duration' => '178',
        ]);
        Song::create([
            'song_name' => 'Lost Cause',
            'artist' => 'Billie Eilish',
            'genre' => 'Pop',
            'img' => 'https://t2.genius.com/unsafe/220x220/https%3A%2F%2Fimages.genius.com%2Fb826bffa6a542a466c2143f4702b9f25.1000x1000x1.png',
            'duration' => '212',
        ]);
        Song::create([
            'song_name' => '34+35',
            'artist' => 'Ariana Grande',
            'genre' => 'Pop',
            'img' => 'https://t2.genius.com/unsafe/220x220/https%3A%2F%2Fimages.genius.com%2F5fcd6a3fa11375296cb3ed04f44c109c.1000x1000x1.jpg',
            'duration' => '173',
        ]);

        Song::create([
            'song_name' => 'Shy Away',
            'artist' => 'Twenty One Pilots',
            'genre' => 'Rock',
            'img' => 'https://t2.genius.com/unsafe/220x220/https%3A%2F%2Fimages.genius.com%2F41e0d1bbc838b0ea401a6e8dc81e1a11.1000x1000x1.jpg',
            'duration' => '175',
        ]);
        Song::create([
            'song_name' => 'Follow You',
            'artist' => 'Imagine Dragons',
            'genre' => 'Rock',
            'img' => 'https://t2.genius.com/unsafe/220x0/https%3A%2F%2Fimages.genius.com%2Fdd36c31557f307171b276c4542256519.1000x1000x1.jpg',
            'duration' => '175',
        ]);
        Song::create([
            'song_name' => 'Amazonia',
            'artist' => 'Gojira',
            'genre' => 'Rock',
            'img' => 'https://t2.genius.com/unsafe/220x0/https%3A%2F%2Fimages.genius.com%2Fe448aac9f258af92338b0d75d4e14cbe.1000x1000x1.jpg',
            'duration' => '300',
        ]);

        Song::create([
            'song_name' => 'Rise',
            'artist' => 'Lost Frequencies',
            'genre' => 'Dance',
            'img' => 'https://t2.genius.com/unsafe/220x0/https%3A%2F%2Fimages.genius.com%2Fc8717bc589b24efddccf2699f8eb56ce.960x960x1.jpg',
            'duration' => '193',
        ]);
        Song::create([
            'song_name' => 'Ride it',
            'artist' => 'Regard',
            'genre' => 'Dance',
            'img' => 'https://t2.genius.com/unsafe/220x0/https%3A%2F%2Fimages.genius.com%2Fe6cb3bb727d22bb516ccae82044e5df5.1000x1000x1.jpg',
            'duration' => '158',
        ]);
        Song::create([
            'song_name' => 'The Business',
            'artist' => 'Tiësto',
            'genre' => 'Dance',
            'img' => 'https://t2.genius.com/unsafe/220x0/https%3A%2F%2Fimages.genius.com%2F0d989b9727223b8b8a10b1a83b229dc7.1000x1000x1.jpg',
            'duration' => '164',
        ]);
    }
}
