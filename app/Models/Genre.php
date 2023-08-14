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
}
