@extends('adminlte::page')

@section('title', 'Reservation System | Rooms Types - Create')

@section('content_header')
  <h1>
    Room Types
    <small>Edit Room type</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li> <i class="fa fa-clone"></i> Room Types</li>
    <li class="active"> <i class="fa fa-edit"></i> Edit</li>
  </ol>
@stop

@section('content')
  <div class="row">
    <div class="col-md-7 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Edit {{ $roomType->name }} Room</h3>
        </div>

        <div class="panel-body overflow-hidden">
          <form
                  action="{{ route('room-type.update', $roomType->slug) }}"
                  method="POST"
                  id="form">

            {{ csrf_field() }}
            {{ method_field('PUT') }}

            @include('layouts.Backend.RoomType.form', [
             'submitButtonText' => 'Update',
             'roomType' => $roomType
            ])

          </form>
        </div>
      </div>

    </div>

@stop