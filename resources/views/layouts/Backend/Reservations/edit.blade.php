@extends('adminlte::page')

@section('title', 'Reservation System | Edit Customer')

@section('content_header')
  <h1>Reservation</h1>
@stop

@section('content')
  <div class="row">
    <div class="col-md-9 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Edit Reservation: {{ $reservation->uuid_text }} </h3>
        </div>

        <div class="panel-body overflow-hidden">

          <form
                  action="{{ route('reservations.update', $reservation->uuid_text) }}"
                  method="POST"
                  id="form"
                  autocomplete="off"
          >

            {{ csrf_field() }}
            {{ method_field('PUT') }}

            @include('layouts.Backend.Reservations.form', [
             'submitButtonText' => 'Update',
             'reservation' => $reservation,
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