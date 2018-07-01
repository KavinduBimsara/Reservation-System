<?php

namespace App\Http\Controllers\Backend;

use App\Models\Room;
use App\Models\Amenity;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Store\StoreRoomRequest;
use App\Http\Requests\Update\UpdateRoomRequest;

class RoomsController extends Controller
{
    /**
     * Fetch JSON listing of the room resource.
     * @return mixed
     * @throws \Exception
     */
    public function dataTable()
    {
        $rooms = Room::latest();

        return DataTables::of($rooms)
            ->editColumn('created_at', function ($date) {
                return $date->created_at->format('j F, Y. h:m:s');
            })
            ->editColumn('updated_at', function ($date) {
                return $date->updated_at->format('j F, Y.  h:m:s');
            })
            ->addColumn('action', function ($room) {
                return '
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown"
                      aria-expanded="false">
                <i class="fa fa-bars"></i></button>
              <ul class="dropdown-menu pull-right" role="menu">
               <li><a  href="'.route('rooms.edit', $room->slug).'"><i class="glyphicon glyphicon-edit"></i>Edit </a></li>
               <li><a onclick="return confirm(\'Are you sure ?\')" href="'.route('rooms.delete', $room->slug).'"><i class="glyphicon glyphicon-trash"></i>Delete</a></li>

              </ul>
            </div>';
            })->make();
    }

    /**
     * Display a listing of the rooms.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.Backend.Rooms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.Backend.Rooms.create')->with('amenities', Amenity::all());
    }

    /**
     * Store a newly created room in storage.
     *
     * @param StoreRoomRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request)
    {
        $room = Room::create([
            'room_no'     => $request->room_no,
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        $room->amenity()->attach($request->amenities);

        return redirect()->route('rooms.index');
    }

    /**
     * Display the specified room.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
    }

    /**
     * Show the form for editing the specified room.
     *
     * @param  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $room = Room::findBySlug($slug);

        $amenities = Amenity::all();

        return view('layouts.Backend.Rooms.edit', compact('room', 'amenities'));
    }

    /**
     * Update the specified room in storage.
     *
     * @param UpdateRoomRequest $request
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomRequest $request, $slug)
    {
        $room = Room::findBySlug($slug);

        $room->update([
            'room_no'     => $request->room_no,
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        $room->amenity()->sync($request->amenities);

        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified room from storage.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($slug)
    {
        $room = Room::findBySlugOrFail($slug);

        $room->delete();

        return redirect()->route('rooms.index');
    }
}
