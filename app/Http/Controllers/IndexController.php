<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Watch;

class IndexController extends Controller
{
    public function index(){
        $categories = Category::all();
        $genres = Genre::all();
        $countries = Country::all();

        return view('pages.home', compact('categories', 'genres', 'countries'));
    }

    public function category($slug){
        return view('pages.category');
    }

    public function genre($slug){
        return view('pages.genre');
    }

    public function country($slug){
        return view('pages.country');
    }

    public function movie(){
        return view('pages.movie');
    }

    public function watch(){
        return view('pages.watch');
    }

    public function episode(){
        return view('pages.episode');
    }
}
