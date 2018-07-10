@extends('adminlte::page')

@section('title', 'Reservation System | Amenities | Edit ' . $amenity->name)

@section('content_header')
  <h1>
    Amenities
    <small>Edit Amenity</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><i class="fa fa-wifi"></i> Amenities</li>
    <li class="active"><i class="fa fa-edit"></i>  Edit</li>
  </ol>
@stop

@section('content')
  <div class="row">

    <div class="col-md-7 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Edit {{ $amenity->name }} Amenity</h3>
        </div>

        <div class="panel-body ">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form
                  action="{{ route('amenities.update', $amenity->slug) }}"
                  method="POST"
                  id="form"
          >

            {{ csrf_field() }}
            {{ method_field('PUT') }}

            @include('layouts.Backend.Amenities.form', [
             'submitButtonText' => 'Update',
             'amenities' => $amenity
            ])
          </form>
        </div>
      </div>

    </div>

@stop