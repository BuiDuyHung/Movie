<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_english',
        'slug',
        'image',
        'description',
        'status',
        'genre_id',
        'category_id',
        'country_id',
        'hot',
        'resolution',
        'sub',
        'year',
        'time',
        'tag',
        'trailer',
        'episode',
        'belong_category'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function genre(){
        return $this->belongsTo(Genre::class, 'genre_id', 'id');
    }

    public function country(){
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function movie_genre()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre', 'movie_id', 'genre_id');
    }

    public function episodes(){
        return $this->hasMany(Episode::class);
    }
}
