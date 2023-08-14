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
        $categories = Category::where('status', 1)->get();
        $genres = Genre::all();
        $countries = Country::all();

        return view('pages.home', compact('categories', 'genres', 'countries'));
    }

    public function category($slug){
        $categories = Category::where('status', 1)->get();
        $genres = Genre::all();
        $countries = Country::all();

        $category_slug = Category::where('slug', $slug)->first();

        return view('pages.category', compact('categories', 'genres', 'countries', 'category_slug'));
    }

    public function genre($slug){
        $categories = Category::where('status', 1)->get();
        $genres = Genre::all();
        $countries = Country::all();

        $genre_slug = Genre::where('slug', $slug)->first();

        return view('pages.genre', compact('categories', 'genres', 'countries', 'genre_slug'));
    }

    public function country($slug){
        $categories = Category::all();
        $genres = Genre::all();
        $countries = Country::all();

        $country_slug = Country::where('slug', $slug)->first();

        return view('pages.country', compact('categories', 'genres', 'countries', 'country_slug'));
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
