<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Genre;



class HomeController extends Controller
{
    public function index(){
        $songs = Song::all();
        $genres = Genre::all();
        // foreach($songs as $song){
        //     echo $song->song_name;
        // }die;

        return view('home', [
            'songs' => $songs,
            'genres' => $genres,
        ]);
    }

    public function queue(){
        return view('queue', [
            'queue' => session('songqueue')
        ]);
    }

    public function selectGenre(Request $request){
        $songs = Song::all();
        $genres = Genre::all();

        return view('home', [ 
            'songs' => $songs,
            'genres' => $genres,
            'genreSelected' => $request->input('genrelist')
        ]);
    }
}
