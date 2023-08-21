<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EpisodeRequest;
use App\Models\Episode;
use App\Models\Movie;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $episodes = Episode::all();

        return view('admincp.episodes.index', compact('episodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies = Movie::orderBy('updated_at', 'DESC')->get();

        return view('admincp.episodes.create', compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EpisodeRequest $request)
    {
        $episode = new Episode();
        $episode->movie_id = $request->movie_id;
        $episode->link = $request->link;
        $episode->episode = $request->episode;
        $episode->save();

        return redirect()->route('admin.episode.index')->with('msg', 'Thêm tập phim thành công !');
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
        $episode = Episode::find($id);
        $movies = Movie::orderBy('updated_at', 'DESC')->get();

        return view('admincp.episodes.edit', compact('episode', 'movies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EpisodeRequest $request, $id)
    {
        $episode = Episode::find($id);

        $episode->movie_id = $request->movie_id;
        $episode->link = $request->link;
        $episode->episode = $request->episode;
        $episode->save();

        return redirect()->route('admin.episode.index')->with('msg', 'Cập nhật tập phim thành công !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $episode = Episode::find($id);
        $episode->delete();

        return redirect()->route('admin.episode.index')->with('msg', 'Xóa tập phim thành công !');
    }

    public function select_movie(){
        $id = $_GET['id'];
        $movie = Movie::find($id);
        $output = '<option value="0">---chọn tập phim---</option>';

        if($movie->belong_category == 'phimbo'){
            for($i=1; $i<=$movie->episode ; $i++) {
                $output.="<option value='".$i."' >$i</option>";
            }
        }else{
            $output.="<option value='HD'>HD</option>
                    <option value='SD'>SD</option>
                    <option value='SD'>HDCam</option>
                    <option value='Cam'>Cam</option>
                    <option value='FullHD'>FullHD</option>";
        }


        echo $output;
    }
}
