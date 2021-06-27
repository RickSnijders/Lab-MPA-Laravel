<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

use App\Classes\Playlist;

class SongController extends Controller
{
    //
    public function view($id){
        $song = Song::findOrFail($id);

        return view('song', [
            'song' => $song
        ]);
    }

    
}
