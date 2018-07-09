<?php

namespace App\Http\Controllers\Backend;

use App\Models\Customer;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class ReservationsController extends Controller
{
    /**
     * Fetch JSON listing of the reservations resource.
     *
     * @return mixed
     * @throws \Exception
     */
    public function dataTable()
    {
        $reservations = Reservation::with('rooms')->select('*')->get();

        return DataTables::of($reservations)->editColumn('created_at', function ($date) {
            return $date->created_at->format('jS F, Y. h:m:s');
        })->editColumn('customer_id', function ($reservation) {
            return $reservation->customer->fullname;
        })->editColumn('start_date', function ($date) {
            return $date->start_date->format('jS F, Y');
        })->editColumn('end_date', function ($date) {
            return $date->end_date->format('jS F, Y');
        })->addColumn('action', function ($reservation) {
            return '
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown"
                      aria-expanded="false">
                <i class="fa fa-bars"></i></button>
              <ul class="dropdown-menu pull-right" role="menu">
               <li><a  href="'.route('reservations.cancel', $reservation->uuid_text).'"><i class="glyphicon glyphicon-remove"></i>Cancel Reservation</a></li>
               <li><a  href="'.route('reservations.edit', $reservation->uuid_text).'"><i class="glyphicon glyphicon-edit"></i>Edit </a></li>
               <li><a onclick="return confirm(\'Are you sure ?\')" href="'.route('reservations.delete', $reservation->uuid_text).'"><i class="glyphicon glyphicon-trash"></i>Delete</a></li>

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
        return view('layouts.Backend.Reservations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('layouts.Backend.Reservations.create')
            ->with('rooms', Room::all())
            ->with('customers', Customer::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $customer = Customer::findOrFail($request->customer_id);

        $reservation = $customer->reservation()->create([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        $reservation->rooms()->attach($request->room_id);

        Session::flash('success', 'Reservation has been created');

        return redirect()->route('reservations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('layouts.Backend.Reservations.edit')
            ->with('reservation', Reservation::withUuid($id)->first())
            ->with('rooms', Room::all())
            ->with('customers', Customer::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reservation = Reservation::withUuid($id)->first();

        $customer = Customer::findOrFail($request->customer_id);

        $customer->reservation()->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        $reservation->rooms()->sync([$request->room_id]);

        Session::flash('success', 'Reservation has been update');

        return redirect()->route('reservations.index');
    }

    /**
     * Cancel the specified reservation
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancelReservation($id)
    {
        $reservation = Reservation::withUuid($id)->first();

        $reservation->delete();

        Session::flash('info', 'Reservation has been cancelled');

        return redirect()->route('reservations.index');
    }

    /**
     * Permanently remove the specified reservation from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::withUuid($id)->first();

        $reservation->rooms()->detach();

        $reservation->forceDelete();

        Session::flash('info', 'Reservation has been deleted');

        return redirect()->route('reservations.index');
    }
}
