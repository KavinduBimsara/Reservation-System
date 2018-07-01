@extends('adminlte::page')

@section('title', 'Reservation System | Rooms - Create')


@section('content')
  <div class="row">
    <div class="col-md-7 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Edit {{ $room->name }} Room</h3>
        </div>

        <div class="panel-body overflow-hidden">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
          <form
                  action="{{ route('rooms.update', $room->slug) }}"
                  method="POST"
                  id="form">

            {{ csrf_field() }}
            {{ method_field('PUT') }}

            @include('layouts.Backend.Rooms.form', [
             'submitButtonText' => 'Update',
             'room' => $room,
             'amenities' => $amenities,
             'roomTypes' => $roomTypes
            ])

          </form>
        </div>
      </div>

    </div>

@stop

    @section('js')

      <script>
          $('#amenities').select2();

      </script>
@stop