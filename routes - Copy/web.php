<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomePageController::class ,'index'])->name('home');
Route::get('/add',[\App\Http\Controllers\HomePageController::class,'add'])->name('add.song');
Route::post('/add',[\App\Http\Controllers\HomePageController::class,'save'])->name('save.song');
Route::delete('/home/{song}',[\App\Http\Controllers\HomePageController::class,'delete'])->name('delete.song');
Route::get('/view/{song}',[\App\Http\Controllers\HomePageController::class,'view'])->name('view.song');
Route::get('/live',[\App\Http\Controllers\HomePageController::class,'live'])->name('live.song');
Route::get('/edit/{song}',[\App\Http\Controllers\HomePageController::class,'edit'])->name('edit.song');
Route::put('/edit/{song}',[\App\Http\Controllers\HomePageController::class,'update'])->name('update.song');
Route::get('/history',[\App\Http\Controllers\HomePageController::class,'showHistory'])->name('history.song');
Route::get('/search',[\App\Http\Controllers\HomePageController::class,'search'])->name('search.song');
Route::get('/liked',[\App\Http\Controllers\HomePageController::class,'like'])->name('like.song');
Route::get('/playRandom',[\App\Http\Controllers\HomePageController::class,'random'])->name('random.song');
Route::delete('/home{album}',[\App\Http\Controllers\AlbumController::class,'delete'])->name('delete.album');




Route::group(['prefix'=>'albums'],function(){
    Route::get('/',[\App\Http\Controllers\AlbumController::class,'index'])->name('albums');
    Route::get('/add',[\App\Http\Controllers\AlbumController::class,'add'])->name('add.album');
    Route::post('/add',[\App\Http\Controllers\AlbumController::class,'save'])->name('save.album');
    Route::get('/show/{album}',[\App\Http\Controllers\AlbumController::class,'show'])->name('show.album');
});

Route::group(['prefix'=>'profile'],function (){
    Route::get('/',[\App\Http\Controllers\ProfileController::class,'index'])->name('profile');
    Route::get('/edit',[\App\Http\Controllers\ProfileController::class,'edit'])->name('edit.profile');
    Route::put('/',[\App\Http\Controllers\ProfileController::class,'update'])->name('profile.update');
});
