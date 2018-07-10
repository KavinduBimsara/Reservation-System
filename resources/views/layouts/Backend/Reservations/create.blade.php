@extends('adminlte::page')

@section('title', 'Reservation System | Create Reservation')


@section('content_header')
    <h1>
        Reservation
        <small>Create Reservation</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li> <i class="fa fa-shopping-bag"></i> Reservations</li>
        <li class="active"> <i class="fa fa-plus"></i> Create</li>
    </ol>
@stop

@section('content')
  <div class="row">
    <div class="col-md-9 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Create Reservation</h3>
        </div>

        <div class="panel-body overflow-hidden">
          @foreach($errors->all() as $e)
            <l>{{ $e }}</l>
          @endforeach
          <form
                  action="{{ route('reservations.store') }}"
                  method="POST"
                  id="form"
                  autocomplete="off"
          >

            {{ csrf_field() }}

            @include('layouts.Backend.Reservations.form', [
             'submitButtonText' => 'Create',
             'reservation' => new \App\Models\Reservation,
             'rooms' => $rooms,
             'customers' => $customers
            ])
          </form>
        </div>
      </div>

    </div>

    @stop


    @section('js')
      <script>
          $("#start_date, #end_date").datepicker({
              maxViewMode: 1,
              clearBtn: true,
              todayHighlight: true,
              toggleActive: true,
              format: "yyyy-mm-dd",
              autoclose: true,
              startDate: '1d',
              endDate: '+3d',
          });

          $("#room_id, #customer_id").select();
      </script>
@stop