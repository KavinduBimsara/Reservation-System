<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Update\UpdateAmenityRequest;
use App\Models\Amenity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreAmenityRequest;
use Illuminate\Validation\Rule;

class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amenities = Amenity::all();

        return view('layouts.Backend.Amenities.index', compact('amenities'));
    }

    /**
     * Show the amenity create form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.Backend.Amenities.create');
    }

    /**
     * Store the newly created amenity resource in storage.
     *
     * @param StoreAmenityRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAmenityRequest $request)
    {
        Amenity::create([
            'name' => $request->name,
            'description'=>$request->description
        ]);

        return redirect()->route('amenities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the amenity form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $amenity = Amenity::find($id);

        return view('layouts.Backend.Amenities.edit', compact('amenity'));
    }

    /**
     * Update the amenity resource in storage.
     *
     * @param UpdateAmenityRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $amenity = Amenity::find($id);

        $request->validate([
            'name'        => ['required', 'string', 'max:255', Rule::unique('amenities')->ignore($amenity->id)],
            'description' => 'required|string|max:255',
        ]);

        $amenity->update([
            'name' => $request->name,
            'description'=>$request->description
        ]);

        return redirect()->route('amenities.index');
    }

    /**
     * Remove the specified amenity resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $amenity = Amenity::find($id);

        $amenity->delete();

        return redirect()->route('amenities.index');
    }
}
