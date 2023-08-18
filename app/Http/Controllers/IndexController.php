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
        $categories = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genres = Genre::all();
        $countries = Country::all();

        $movie_hot = Movie::where('hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->get();
        $movie_trailer = Movie::where('hot', 1)->where('status', 1)->where('resolution', 5)->orderBy('updated_at', 'DESC')->take(8)->get();
        $moviehot_sidebar = Movie::where('hot', 1)->where('status', 1)->whereNotIn('resolution',[5])->orderBy('updated_at', 'DESC')->take(8)->get();

        $categories_home = Category::with('movies')->where('status', 1)->get();

        return view('pages.home', compact('categories', 'genres', 'countries', 'categories_home', 'movie_hot', 'moviehot_sidebar', 'movie_trailer'));
    }

    public function search(){
        if(isset($_GET['search'])){
            $search = $_GET['search'];

            $categories = Category::orderBy('position', 'ASC')->where('status', 1)->get();
            $genres = Genre::all();
            $countries = Country::all();
            $moviehot_sidebar = Movie::where('hot', 1)->where('status', 1)->whereNotIn('resolution',[5])->orderBy('updated_at', 'DESC')->take(8)->get();
            $movie_trailer = Movie::where('hot', 1)->where('status', 1)->where('resolution', 5)->orderBy('updated_at', 'DESC')->take(8)->get();

            $movie = Movie::where('title','LIKE', '%'.$search.'%' )->orderBy('updated_at', 'DESC')->paginate(20);

            return view('pages.search', compact('categories', 'genres', 'countries', 'moviehot_sidebar', 'movie_trailer', 'movie', 'search'));
        }else{
            redirect()->route('home.index');
        }

    }

    public function category($slug){
        $categories = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genres = Genre::all();
        $countries = Country::all();
        $moviehot_sidebar = Movie::where('hot', 1)->where('status', 1)->whereNotIn('resolution',[5])->orderBy('updated_at', 'DESC')->take(8)->get();
        $movie_trailer = Movie::where('hot', 1)->where('status', 1)->where('resolution', 5)->orderBy('updated_at', 'DESC')->take(8)->get();

        $category_slug = Category::where('slug', $slug)->first();
        $movie = Movie::where('category_id', $category_slug->id)->orderBy('updated_at', 'DESC')->paginate(20);

        return view('pages.category', compact('categories', 'genres', 'countries', 'category_slug', 'movie', 'moviehot_sidebar', 'movie_trailer'));
    }

    public function year($year){
        $categories = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genres = Genre::all();
        $countries = Country::all();
        $moviehot_sidebar = Movie::where('hot', 1)->where('status', 1)->whereNotIn('resolution',[5])->orderBy('updated_at', 'DESC')->take(8)->get();
        $movie_trailer = Movie::where('hot', 1)->where('status', 1)->where('resolution', 5)->orderBy('updated_at', 'DESC')->take(8)->get();

        $year = $year;
        $movie = Movie::where('year', $year)->orderBy('updated_at', 'DESC')->paginate(20);

        return view('pages.year', compact('categories', 'genres', 'countries', 'year', 'movie', 'moviehot_sidebar', 'movie_trailer'));
    }

    public function tag($tag){
        $categories = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genres = Genre::all();
        $countries = Country::all();
        $moviehot_sidebar = Movie::where('hot', 1)->where('status', 1)->whereNotIn('resolution',[5])->orderBy('updated_at', 'DESC')->take(8)->get();
        $movie_trailer = Movie::where('hot', 1)->where('status', 1)->where('resolution', 5)->orderBy('updated_at', 'DESC')->take(8)->get();

        $tag = $tag;
        $movie = Movie::where('tag', 'LIKE', '%'.$tag.'%')->orderBy('updated_at', 'DESC')->paginate(20);

        return view('pages.tag', compact('categories', 'genres', 'countries', 'tag', 'movie', 'moviehot_sidebar', 'movie_trailer'));
    }

    public function genre($slug){
        $categories = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genres = Genre::all();
        $countries = Country::all();
        $moviehot_sidebar = Movie::where('hot', 1)->where('status', 1)->whereNotIn('resolution',[5])->orderBy('updated_at', 'DESC')->take(8)->get();
        $movie_trailer = Movie::where('hot', 1)->where('status', 1)->where('resolution', 5)->orderBy('updated_at', 'DESC')->take(8)->get();

        $genre_slug = Genre::where('slug', $slug)->first();
        $movie = Movie::where('genre_id', $genre_slug->id)->orderBy('updated_at', 'DESC')->paginate(20);

        return view('pages.genre', compact('categories', 'genres', 'countries', 'genre_slug', 'movie', 'moviehot_sidebar', 'movie_trailer'));
    }

    public function country($slug){
        $categories = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genres = Genre::all();
        $countries = Country::all();
        $moviehot_sidebar = Movie::where('hot', 1)->where('status', 1)->whereNotIn('resolution',[5])->orderBy('updated_at', 'DESC')->take(8)->get();
        $movie_trailer = Movie::where('hot', 1)->where('status', 1)->where('resolution', 5)->orderBy('updated_at', 'DESC')->take(8)->get();

        $country_slug = Country::where('slug', $slug)->first();
        $movie = Movie::where('country_id', $country_slug->id)->orderBy('updated_at', 'DESC')->paginate(20);

        return view('pages.country', compact('categories', 'genres', 'countries', 'country_slug', 'movie', 'moviehot_sidebar', 'movie_trailer'));
    }

    public function movie($slug){
        $categories = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genres = Genre::all();
        $countries = Country::all();
        $moviehot_sidebar = Movie::where('hot', 1)->where('status', 1)->whereNotIn('resolution',[5])->orderBy('updated_at', 'DESC')->take(8)->get();
        $movie_trailer = Movie::where('hot', 1)->where('status', 1)->where('resolution', 5)->orderBy('updated_at', 'DESC')->take(8)->get();

        $movie = Movie::where('slug',$slug)->where('status', 1)->first();
        $related = Movie::where('category_id', $movie->category->id)->whereNotIn('slug', [$slug])->inRandomOrder()->get();

        return view('pages.movie', compact('categories', 'genres', 'countries', 'movie', 'related', 'moviehot_sidebar', 'movie_trailer'));
    }

    public function watch(){
        $categories = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genres = Genre::all();
        $countries = Country::all();

        return view('pages.watch', compact('categories', 'genres', 'countries'));
    }

    public function episode(){
        $categories = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genres = Genre::all();
        $countries = Country::all();

        return view('pages.episode', compact('categories', 'genres', 'countries'));
    }
}
