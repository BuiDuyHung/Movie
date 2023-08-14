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
    public $timestamps = false;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'status',
        'genre_id',
        'category_id',
        'country_id',
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
}
