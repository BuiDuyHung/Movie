<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Models\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::all();
        $countCountry = $countries->count();
        session()->put('countCountry', $countCountry);

        return view('admincp.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admincp.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request)
    {
        Country::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->route('admin.country.index')->with('msg', 'Thêm quốc gia thành công !');
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
        $country = Country::find($id);

        return view('admincp.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountryRequest $request, $id)
    {
        $country = Country::find($id);
        $country->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->route('admin.country.index')->with('msg', 'Cập nhật quốc gia thành công !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();

        return redirect()->route('admin.country.index')->with('msg', 'xóa quốc gia thành công !');
    }
}
