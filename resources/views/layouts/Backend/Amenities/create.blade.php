@extends('adminlte::page')

@section('title', 'Reservation System | Amenities - Create')

@section('content_header')
  <h1>
    Amenities
    <small>Create Amenity</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li> <i class="fa fa-wifi"></i> Amenities</li>
    <li class="active"> <i class="fa fa-plus"></i> Create</li>
  </ol>
@stop

@section('content')
<div class="row">
  <div class="col-md-7 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title text-center">Create Amenity</h3>
      </div>

      <div class="panel-body overflow-hidden">
        <form
                action="{{ route('amenities.store') }}"
                method="POST"
                id="form">

          {{ csrf_field() }}

          @include('layouts.Backend.Amenities.form', [
           'submitButtonText' => 'Create',
           'amenities' => new \App\Models\Amenity,
          ])

        </form>
      </div>
    </div>

  </div>

@stop