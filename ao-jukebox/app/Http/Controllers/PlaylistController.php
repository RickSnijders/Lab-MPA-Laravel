<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Genre;
use App\Models\Playlist;
use Validator;
use Illuminate\Support\Facades\DB;
use Auth;

class PlaylistController extends Controller
{
    //
    public function index(Request $request){
        $playlists = '';
        $playlistitems = '';
        $songs = Song::all();
        $genres = Genre::all();
        if(isset(Auth::user()->email)){
            $playlists = DB::table('playlists')->where('userid', $request->user()->id)->get();
            $playlistitems = DB::table('playlistitem')->get();
        }
       
        return view('playlist', [
            'songs' => $songs,
            'genres' => $genres,
            'playlists' => $playlists,
            'playlistitems' => $playlistitems,
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
        return redirect('/playlist');
    }

    public function save(Request $request){
        // var_dump(session('songqueue'));
        $name = date('Y-m-d H:i:s').'_Queue';
        $totalsongs = count(session('songqueue'));
        $userid = $request->user()->id;
        $playlistid = DB::table('playlists')->insertGetId(
            ['name' => $name, 'userid' => $userid]
        );
        $p=0;
        for ($x = 0; $x < $totalsongs; $x++) {
            DB::insert('insert into playlistitem (playlistid, songid) values (?, ?)', [$playlistid, session('songqueue')[$p]['id']]);  
            $p = $p+1;
        }
        // return redirect('/playlist');
        return $this->playlistname($playlistid);

    }

    public function playlistname($id){
        $name = DB::table('playlists')->where('id', $id)->get();
        return view('playlistname', [
            'playlistid' => $id,
            'name' => $name,
        ]);
       
    }

    public function newname(Request $request){
        $this->validate(request(), [
            'playlistname' => 'required',
            
        ]);
        $result = DB::table('playlists')->where('userid', $request->user()->id)->where('id', $request->playlistid)->get();
        if ($result->isEmpty()) { 
            return back()->with('error', 'Something went wrong');
        } else{
            DB::table('playlists')->where('userid', $request->user()->id)->where('id', $request->playlistid)->update(['name' => $request->input('playlistname')]);  
            return redirect('/playlist');
        }
        
    }

    public function delete($id){
        DB::table('playlists')->where('id', '=', $id)->delete();
        DB::table('playlistitem')->where('playlistid', '=', $id)->delete();
        return redirect('/playlist');
    }

    public function deletesong($id){
        DB::table('playlistitem')->where('id', '=', $id)->delete();
        return redirect('/playlist');
    }

    public function addsong($id){
        $pickedsongs = DB::table('playlistitem')->where('playlistid', $id)->pluck('songid');
        $songs = Song::all();
        return view('playlistsongadd', [
            'songs' => $songs,
            'playlistid' => $id,
            'pickedsongs' => $pickedsongs,
        ]);
    }

    public function addsongtopl(Request $request){
        $songlist = array();
   
        foreach ($request->input() as $song){
            if( $song==(int)$song){
                if( $song>0){
                    array_push($songlist, $song);
                }   
            }
        }

        if($songlist == NULL){
            return redirect('/');
        }

        foreach ($songlist as $item){
            DB::insert('insert into playlistitem (playlistid, songid) values (?, ?)', [$request->input('playlistid'), $item]);
        }
        return redirect('/playlist');
    }
}

 