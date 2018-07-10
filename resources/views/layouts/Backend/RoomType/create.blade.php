@extends('adminlte::page')

@section('title', 'Reservation System | Room Type - Create')

@section('content_header')
  <h1>
    Room Types
    <small>Create Room type</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li> <i class="fa fa-clone"></i> Room Types</li>
    <li class="active"> <i class="fa fa-plus"></i> Create</li>
  </ol>
@stop

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

