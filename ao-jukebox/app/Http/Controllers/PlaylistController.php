<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Genre;
use App\Models\Playlist;
use Validator;
use Illuminate\Support\Facades\DB;

class PlaylistController extends Controller
{
    //
    public function index(){
        $songs = Song::all();
        $genres = Genre::all();
        return view('playlist', [
            'songs' => $songs,
            'genres' => $genres,
        ]);
    }

    public function create(Request $request){
        $this->validate(request(), [
            'playlistname' => 'required',
            
        ]);
        // var_dump($request->input());
        $songlist = array();
   
        foreach ($request->input() as $song){
            if( $song==(int)$song){
                if( $song>0){
                    array_push($songlist, $song);
                }   
            }
        }
        $pname = $request->input('playlistname');
        $userid = $request->user()->id;
        
        $playlistid = DB::table('playlists')->insertGetId(
            ['name' => $pname, 'userid' => $userid]
        );
        return $this->addsongs($songlist, $playlistid);
    }

    public function addsongs($list, $playlistid){
        if($list == NULL){
            return redirect('/');
        }
        var_dump($list);
        echo $playlistid;
        foreach ($list as $item){
            DB::insert('insert into playlistitem (playlistid, songid) values (?, ?)', [$playlistid, $item]);
        }
        return redirect('/');
    }

    public function save(Request $request){
        var_dump($request->input());
    }
}

 