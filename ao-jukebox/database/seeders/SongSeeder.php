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
            'song_name' => Str::random(10),
        ]);
        Song::create([
            'song_name' => Str::random(10),
        ]);
        Song::create([
            'song_name' => Str::random(10),
        ]);
    }
}
