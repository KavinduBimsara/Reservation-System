<?php

namespace App\Http\Controllers\Backend;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Store\StoreCustomersRequest;

class CustomersController extends Controller
{
    /**
     * Fetch JSON listing of the customer resource.
     * @return mixed
     * @throws \Exception
     */
    public function dataTable()
    {
        $customers = Customer::latest();

        return DataTables::of($customers)
            ->editColumn('created_at', function ($date) {
                return $date->created_at->format('j F, Y. h:m:s');
            })
            ->editColumn('updated_at', function ($date) {
                return $date->updated_at->format('j F, Y.  h:m:s');
            })
            ->addColumn('action', function ($customer) {
                return '
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown"
                      aria-expanded="false">
                <i class="fa fa-bars"></i></button>
              <ul class="dropdown-menu pull-right" role="menu">
               <li><a  href="'.route('customers.edit', $customer->slug).'"><i class="glyphicon glyphicon-edit"></i>Edit </a></li>
               <li><a onclick="return confirm(\'Are you sure ?\')" href="'.route('customers.delete', $customer->slug).'"><i class="glyphicon glyphicon-trash"></i>Delete</a></li>

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
        return view('layouts.Backend.Customers.index');
    }

    /**
     * Show the form for creating a new customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.Backend.Customers.create');
    }

    /**
     * Store a newly created customer in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomersRequest $request)
    {
        Customer::create([
            'title'      => $request->title,
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
        ]);

        Session::flash('success', 'Customer has been created');

        return redirect()->route('customers.index');
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
    public function edit($slug)
    {
        $customer = Customer::findBySlugOrFail($slug);

        return view('layouts.Backend.Customers.edit', compact('customer'));
    }

    /**
     * Update the specified customer in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $customer = Customer::findBySlugOrFail($slug);

        $request->validate([
            'first_name'  => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email' => ['required', 'string', 'max:255', Rule::unique('customers')->ignore($customer->id)],
        ]);

        $customer->update([
            'title'      => $request->title,
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
        ]);

        Session::flash('success', 'Customer has been updated');

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $customer = Customer::findBySlugOrFail($slug);

        try {
            $customer->delete();
        } catch (\Exception $e) {
        }

        Session::flash('info', 'Customer has been deleted');

        return redirect()->route('customers.index');
    }
}
