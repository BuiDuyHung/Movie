<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::with('category', 'country', 'movie_genre')->withCount('episodes')->orderBy('updated_at', 'DESC')->get();

        // count episode -> dashboard
        $countEpisode = Movie::all()->count();
        session()->put('countEpisode', $countEpisode);

        $path = public_path().'/json/';
        if(!is_dir($path)){
            mkdir($path, 0777, true);
        }
        File::put($path.'movies.json', json_encode($movies));
        return view('admincp.movies.index', compact('movies'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $genres = Genre::all();
        $countries = Country::all();

        return view('admincp.movies.create', compact('categories', 'genres', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieRequest $request)
    {
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->title_english = $request->title_english;
        $movie->slug = $request->slug;
        $movie->description = $request->description;
        $movie->status = $request->status;
        $movie->category_id = $request->category_id;
        $movie->country_id = $request->country_id;
        $movie->hot = $request->hot;
        $movie->resolution = $request->resolution;
        $movie->sub = $request->sub;
        $movie->image = $request->image;
        $movie->year = $request->year;
        $movie->time = $request->time;
        $movie->episode = $request->episode;
        $movie->tag = $request->tag;
        $movie->topview = $request->topview;
        $movie->trailer = $request->trailer;
        $movie->belong_category = $request->belong_category;
        foreach($request->genre_id as $genre){
            $movie->genre_id = $genre[0];
        }
        $movie->save();

        $movie->movie_genre()->attach($request->genre_id);

        return redirect()->route('admin.movie.index')->with('msg', 'Thêm phim thành công !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::all();
        $genres = Genre::all();
        $countries = Country::all();
        $movie = Movie::find($id);

        $movie_genre = $movie->movie_genre;

        return view('admincp.movies.edit', compact('movie', 'categories', 'genres', 'countries', 'movie_genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieRequest $request, $id)
    {
        $movie = Movie::find($id);

        $movie->title = $request->title;
        $movie->title_english = $request->title_english;
        $movie->slug = $request->slug;
        $movie->description = $request->description;
        $movie->status = $request->status;
        $movie->category_id = $request->category_id;
        $movie->country_id = $request->country_id;
        $movie->hot = $request->hot;
        $movie->resolution = $request->resolution;
        $movie->sub = $request->sub;
        $movie->image = $request->image;
        $movie->year = $request->year;
        $movie->time = $request->time;
        $movie->episode = $request->episode;
        $movie->tag = $request->tag;
        $movie->topview = $request->topview;
        $movie->trailer = $request->trailer;
        $movie->belong_category = $request->belong_category;
        foreach($request->genre_id as $genre){
            $movie->genre_id = $genre[0];
        }
        $movie->save();

        $movie->movie_genre()->sync($request->genre_id);

        return redirect()->route('admin.movie.index')->with('msg', 'Cập nhật phim thành công !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        if($movie){
            deleteFileStorage($movie->image);

        }
        $movie->delete();

        return redirect()->route('admin.movie.index')->with('msg', 'xóa phim thành công !');
    }

    public function update_year(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['id_movie']);
        $movie->year = $data['year'];
        $movie->save();
    }

    public function update_season(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['id_movie']);
        $movie->season = $data['season'];
        $movie->save();
    }

    public function update_topview(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['id_movie']);
        $movie->topview = $data['topview'];
        $movie->save();
    }

    public function filter_topview(Request $request){
        $data = $request->all();
        $movie = Movie::where('topview', $data['value'])->orderBy('updated_at', 'DESC')->take(10)->get();
        $output = '';
        foreach($movie as $item){
            if($item->resolution == 1){
                $text = 'HD';
            }elseif($item->resolution == 2){
                $text = 'SD';
            }elseif($item->resolution == 3){
                $text = 'HDCam';
            }elseif($item->resolution == 4){
                $text = 'Cam';
            }elseif($item->resolution == 5){
                $text = 'Trailer';
            }else{
                $text = 'FullHD';
            }

            $output .= '<div id="halim-ajax-popular-post" class="popular-post" style="popular-post: 0;">
                            <div class="item post-37176">
                                <a href="'. route('home.movie', $item->slug) .'" title="'.$item->title.'">
                                <div class="item-link">
                                    <img src="'.$item->image.'" class="lazy post-thumb" alt="'.$item->slug.'" title="'.$item->title.'" />
                                    <span class="is_trailer">'.$text.'</span>
                                </div>
                                <p class="title">'.$item->title.'</p>
                                </a>
                                <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                                <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                                <span style="width: 0%"></span>
                                </span>
                                </div>
                            </div>
                        </div>';
        }

        echo $output;
    }

    public function filter_default(Request $request){
        $data = $request->all();
        $movie = Movie::where('topview', 1)->orderBy('updated_at', 'DESC')->take(6)->get();
        $output = '';
        foreach($movie as $item){
            if($item->resolution == 1){
                $text = 'HD';
            }elseif($item->resolution == 2){
                $text = 'SD';
            }elseif($item->resolution == 3){
                $text = 'HDCam';
            }elseif($item->resolution == 4){
                $text = 'Cam';
            }else{
                $text = 'FullHD';
            }

            $output .= '<div class="item post-37176">
                                <a href="'. route('home.movie', $item->slug) .'" title="'.$item->title.'">
                                <div class="item-link">
                                    <img src="'.$item->image.'" class="lazy post-thumb" alt="'.$item->slug.'" title="'.$item->title.'" />
                                    <span class="is_trailer">'.$text.'</span>
                                </div>
                                <p class="title">'.$item->title.'</p>
                                </a>
                                <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                                <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                                <span style="width: 0%"></span>
                                </span>
                                </div>
                            </div>';
        }

        echo $output;
    }
}
