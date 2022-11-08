<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'link',
        'song_album_id',
        'like_id',
        'user_id'
    ];

    protected $dates =[
        'created_at',
        'updated_at'
    ];

    public function albums(){
        return $this->belongsTo(Album::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
}
