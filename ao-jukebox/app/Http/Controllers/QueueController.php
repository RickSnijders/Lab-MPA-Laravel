<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Classes\Playlist;

class QueueController extends Controller
{
    //
    public function addSongToQueue($id){
        $song = Song::findOrFail($id);
        echo $song->song_name;
        $playlist = new Playlist();
        $playlist->addtoqueue();
    }
}
