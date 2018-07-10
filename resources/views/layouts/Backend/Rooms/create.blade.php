@extends('adminlte::page')

@section('title', 'Reservation System | Rooms - Create')

@section('content_header')
    <h1>
        Rooms
        <small>Create room</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><i class="fa fa-bed"></i> Rooms</li>
        <li class="active"><i class="fa fa-plus"></i>  Create</li>
    </ol>
@stop

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