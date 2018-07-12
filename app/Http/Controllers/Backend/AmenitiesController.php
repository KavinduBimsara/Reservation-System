<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreAmenityRequest;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class AmenitiesController extends Controller
{
    public function dataTable()
    {
        $amenities = Amenity::select(['id', 'name', 'description', 'created_at', 'updated_at', 'slug']);

        return Datatables::of($amenities)
            ->editColumn('created_at', function ($date) {
                return $date->created_at->format('jS F, Y ');
            })
            ->editColumn('updated_at', function ($date) {
                return $date->updated_at ? $date->updated_at->format('jS F, Y ') : '';
            })
            ->addColumn('action', function ($amenity) {
                return '
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown"
                      aria-expanded="false">
                <i class="fa fa-bars"></i></button>
              <ul class="dropdown-menu pull-right" role="menu">
               <li><a  href="'.route('amenities.edit', $amenity->slug).'"><i class="glyphicon glyphicon-edit"></i>Edit </a></li>
               <li><a onclick="return confirm(\'Are you sure ?\')" href="'.route('amenities.delete', $amenity->slug).'"><i class="glyphicon glyphicon-trash"></i>Delete</a></li>

              </ul>
            </div>';
            })->make();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.Backend.Amenities.index');
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
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAmenityRequest $request)
    {
        Amenity::create([
            'name'       => $request->name,
            'description'=> $request->description,
        ]);

        return redirect()->route('amenities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the amenity form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $amenity = Amenity::findBySlugOrFail($slug);

        return view('layouts.Backend.Amenities.edit', compact('amenity'));
    }

    /**
     * Update the amenity resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $amenity = Amenity::findBySlugOrFail($slug);

        $request->validate([
            'name'        => ['required', 'string', 'max:255', Rule::unique('amenities')->ignore($amenity->id)],
            'description' => 'required|string|max:255',
        ]);

        $amenity->update([
            'name'       => $request->name,
            'description'=> $request->description,
        ]);

        return redirect()->route('amenities.index');
    }

    /**
     * Remove the specified amenity resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $amenity = Amenity::findOrFail($id);

        $amenity->delete();

        return redirect()->route('amenities.index');
    }
}
