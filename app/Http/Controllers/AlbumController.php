<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{

    public function index(){
        return view('pages.albums.indexAlbums',[
            'albums'=>Auth::user()->albums
        ]);
    }
    public function add(){
        return view('pages.albums.addAlbums');


    }

    public function save(Request $request){
        /** @var User $user */
        $user=Auth::user();
        $args = $request->only('name','image_link');
        $args['user_id']=$user->id;
        $album = new Album($args);
        $album->save();
        return redirect()->route('home');
    }
    public function show(Album $album){
        return view('pages.albums.albums',[
            'album'=>$album,
            'songs'=>Song::all(),

        ]);
    }
    public function delete(Album $album){
        $album->delete();
        return redirect()->route('home');
    }

}
