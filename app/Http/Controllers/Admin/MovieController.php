<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Country;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();

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

        Movie::create([
            'title' => $request->title,
            'title_english' => $request->title_english,
            'slug' => $request->slug,
            'description' => $request->description,
            'status' => $request->status,
            'genre_id' => $request->genre_id,
            'category_id' => $request->category_id,
            'country_id' => $request->country_id,
            'hot' => $request->hot,
            'sub' => $request->sub,
            'resolution' => $request->resolution,
            'image' => $request->image
        ]);

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

        return view('admincp.movies.edit', compact('movie', 'categories', 'genres', 'countries'));
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
        $movie->genre_id = $request->genre_id;
        $movie->country_id = $request->country_id;
        $movie->hot = $request->hot;
        $movie->resolution = $request->resolution;
        $movie->sub = $request->sub;
        $movie->image = $request->image;
        $movie->save();

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
}
