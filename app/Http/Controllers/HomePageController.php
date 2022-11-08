<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function index(Request $request){
//        $numberOfItems = $request->get('items');
//        $songs = Song::paginate($numberOfItems ? $numberOfItems : 5);
        $songs = Song::where('user_id',Auth::user()->id)->paginate(5);
        return view('pages.homePage',[
            'songs'=>$songs,
            'albums'=>Auth::user()->albums

        ]);
    }

    public function add(){
        return view('pages.add');
    }

    public function save(Request $request){
        /** @var User $user */
        $user=Auth::user();
        $args = $request->only(['name','link','song_album_id']);
        $args['user_id']=$user->id;
        $song = new Song($args);
        $song->save();
        return redirect()->route('home');
    }
    public function delete(Song $song){
        $song->delete();
        return redirect()->back();
    }

    public function view(Song $song){
        return view('pages.view',[
            'song'=>$song
        ]);
    }

    public function live(){
        return view('pages.live');
    }

    public function edit(Song $song){
        return view('pages.edit',[
            'song'=>$song,
            'albums'=>Album::all()
        ]);
    }


    public function update(Request $request ,Song $song){
        $args = $request->only(['name','link','song_album_id','like_id']);
        $song->update($args);
        return redirect()->route('home');
    }

    public function showHistory(){
        return view('pages.history',[
            'songs'=>Auth::user()->songs
        ]);
    }

    public function search(Request $request){
        $search = $request->get('search');
        $songs = Song::where('name',"LIKE","%$search%")->get();
        return view('pages.homePage',[
            'songs'=>Auth::user()->songs,
            'albums'=>Album::all()
        ]);
    }

    public function like(){
        return view('pages.likedVideos',[
            'songs'=>Auth::user()->songs
        ]);
    }

    public function random(){
        return view("pages.random",[
            'song'=>Auth::user()->songs->random()
        ]);
    }



}
