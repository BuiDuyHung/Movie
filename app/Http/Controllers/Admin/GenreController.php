<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();

        return view('admincp.genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admincp.genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenreRequest $request)
    {
        Genre::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->route('admin.genre.index')->with('msg', 'Thêm thể loại thành công !');
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
        $genre = Genre::find($id);

        return view('admincp.genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GenreRequest $request, $id)
    {
        $genre = Genre::find($id);
        $genre->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->route('admin.genre.index')->with('msg', 'Cập nhật thể loại thành công !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $genre = Genre::find($id);
        $genre->delete();

        return redirect()->route('admin.genre.index')->with('msg', 'xóa thể loại thành công !');
    }
}
