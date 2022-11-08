<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_link',
        'user_id'

    ];


    protected $dates =[
        'created_at',
        'updated_at'
    ];

    public function songs(){
        return $this->hasMany(Song::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
}
