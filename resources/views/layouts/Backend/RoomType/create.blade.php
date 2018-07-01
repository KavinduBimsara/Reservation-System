@extends('adminlte::page')

@section('title', 'Reservation System | Room Type - Create')


@section('content')
  <div class="row">
    <div class="col-md-7 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Create Room Type</h3>
        </div>

        <div class="panel-body overflow-hidden">

          @foreach($errors->all() as $rerror)
            {{$rerror}}
          @endforeach
          <form
                  action="{{ route('room-type.store') }}"
                  method="POST"
                  id="form">

            {{ csrf_field() }}

            @include('layouts.Backend.RoomType.form', [
             'submitButtonText' => 'Create',
             'roomType' => new \App\Models\RoomType,

            ])

          </form>
        </div>
      </div>

    </div>

    @stop

