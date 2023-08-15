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
        $get_image = $request->file('image');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . '_' . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/movie', $new_image);
        }

        Movie::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'status' => $request->status,
            'genre_id' => $request->genre_id,
            'category_id' => $request->category_id,
            'country_id' => $request->country_id,
            'image' => $new_image
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
        $data = $request->all();

        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->genre_id = $data['genre_id'];
        $movie->country_id = $data['country_id'];

        $get_image = $request->file('image');

        if($request->image){
            if (!empty($movie->image)) {
                unlink('uploads/movie/' . $movie->image);
            }
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . '_' . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/movie', $new_image);
            $movie->image = $new_image;
        }

        $movie->save();

        return redirect()->route('admin.movie.index')->with('msg', 'Cập nhật phim thành công !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        if (!empty($movie->image)) {
            unlink('uploads/movie/' . $movie->image);
        }
        $movie->delete();

        return redirect()->route('admin.movie.index')->with('msg', 'xóa phim thành công !');
    }
}
