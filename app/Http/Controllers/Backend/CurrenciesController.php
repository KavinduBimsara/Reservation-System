<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class CurrenciesController extends Controller
{
    public function dataTable()
    {
        $currency = Currency::latest();

        return Datatables::of($currency)->editColumn('created_at', function ($date) {
            return $date->created_at->format('jS F, Y ');
        })->editColumn('updated_at', function ($date) {
            return $date->updated_at ? $date->updated_at->format('jS F, Y ') : '';
        })->addColumn('action', function ($currency) {
            return '
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown"
                          aria-expanded="false">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                   <li><a  href="'.route('currencies.edit', $currency->id).'"><i class="glyphicon glyphicon-edit"></i>Edit </a></li>
                   <li><a onclick="return confirm(\'Are you sure ?\')" href="'.route('currencies.delete', $currency->id).'"><i class="glyphicon glyphicon-trash">
                   </i>Delete</a></li>
                  </ul>
                </div>';
        })->make();
    }

    public function index()
    {
        return view('layouts.Backend.Currency.index');
    }

    public function create()
    {
        return view('layouts.Backend.Currency.create');
    }

    public function store(Request $request)
    {
        Currency::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('currencies.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $currency = Currency::findOrFail($id);

        return view('layouts.Backend.Currency.edit', compact('currency'));
    }

    public function update(Request $request, $id)
    {
        $currency = Currency::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('currencies')->ignore($currency->id)],
            'code' => 'required|min:3|max:3',
        ]);

        $currency->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('currencies.index');
    }

    public function destroy($id)
    {
        $currency = Currency::findOrFail($id);

        $currency->delete();

        return redirect()->route('currencies.index');
    }
}
