<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;



class HomeController extends Controller
{
    public function index(){
        $songs = Song::all();

        // foreach($songs as $song){
        //     echo $song->song_name;
        // }die;

        return view('home', [
            'songs' => $songs
        ]);
    }

    public function queue(){
        return view('queue');
    }
}
