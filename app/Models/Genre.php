<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;

class Genre extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
    ];

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }

    // public function movie_genre()
    // {
    //     return $this->belongsToMany(Movie::class, 'movie_genre', 'genre_id', 'movie_id');
    // }

    public function movie(){
        return $this->belongsTo(Movie::class);
    }
}
