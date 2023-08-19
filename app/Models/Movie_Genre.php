<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie_Genre extends Model
{
    use HasFactory;
    protected $table = 'movie_genre';
    public $timestamps = false;

    protected $fillable = [
        'genre_id',
        'movie_id',
    ];
}
