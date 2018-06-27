@extends('adminlte::page')

@section('title', 'Reservation System | Amenities | Edit ' . $amenity->name)

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
                  action="{{ route('amenities.update', $amenity->id) }}"
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