<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreRoomTypeRequest;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class RoomTypeController extends Controller
{
    /**
     * Fetch JSON listing of the room type resource.
     *
     * @throws \Exception
     *
     * @return mixed
     */
    public function dataTable()
    {
        $roomTypes = RoomType::all();

        return DataTables::of($roomTypes)
            ->editColumn('created_at', function ($date) {
                return $date->created_at->format('j F, Y. h:m:s');
            })
            ->editColumn('updated_at', function ($date) {
                return $date->updated_at->format('j F, Y.  h:m:s');
            })
            ->addColumn('action', function ($roomType) {
                return '
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown"
                      aria-expanded="false">
                <i class="fa fa-bars"></i></button>
              <ul class="dropdown-menu pull-right" role="menu">
               <li><a  href="'.route('room-type.edit', $roomType->slug).'"><i class="glyphicon glyphicon-edit"></i>Edit </a></li>
               <li><a onclick="return confirm(\'Are you sure ?\')" href="'.route('room-type.delete', $roomType->slug).'"><i class="glyphicon glyphicon-trash"></i>Delete</a></li>

              </ul>
            </div>';
            })->make();
    }

    /**
     * Display a listing of the roomType.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.Backend.RoomType.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.Backend.RoomType.create');
    }

    /**
     * Store a newly created roomType in storage.
     *
     * @param StoreRoomTypeRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomTypeRequest $request)
    {
        $roomType = new RoomType();

        $roomType->create([
            'name'        => $request->name,
            'description' => $request->description,
            'capacity'    => $request->capacity,
        ]);

        return redirect()->route('room-type.index');
    }

    /**
     * Display the specified roomType.
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
     * Show the form for editing the specified roomType.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $roomType = RoomType::findBySlugOrFail($slug);

        return view('layouts.Backend.RoomType.edit', compact('roomType'));
    }

    /**
     * Update the specified roomType in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $roomType = RoomType::findBySlugOrFail($slug);

        $request->validate([
            'name'        => ['required', 'string', 'max:255', Rule::unique('amenities')->ignore($roomType->id)],
            'description' => 'required|string|max:255',
            'capacity'    => 'required|max:255',
        ]);

        $roomType->update([
            'name'        => $request->name,
            'description' => $request->description,
            'capacity'    => $request->capacity,
        ]);

        return redirect()->route('room-type.index');
    }

    /**
     * Remove the specified roomType from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $roomType = RoomType::findBySlugOrFail($slug);

        $roomType->delete();

        return redirect()->route('room-type.index');
    }
}
