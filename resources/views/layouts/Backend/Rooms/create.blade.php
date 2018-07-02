@extends('adminlte::page')

@section('title', 'Reservation System | Rooms - Create')


@section('content')
  <div class="row">
    <div class="col-md-7 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Create Room</h3>
        </div>

        <div class="panel-body overflow-hidden">
          <form
                  action="{{ route('rooms.store') }}"
                  method="POST"
                  id="form">

            {{ csrf_field() }}

            @include('layouts.Backend.Rooms.form', [
             'submitButtonText' => 'Create',
             'room' => new \App\Models\Room,
             'amenities' => $amenities,
             'roomTypes' => $roomTypes,
            ])

          </form>
        </div>
      </div>

    </div>

@stop

@section('js')

      <script>
        $('#amenities').select2();
        $('#roomType').select2();
      </script>
@stop