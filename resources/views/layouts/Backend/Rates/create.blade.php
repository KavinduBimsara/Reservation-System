@extends('adminlte::page')

@section('title', 'Reservation System | Create Customer')

@section('content_header')
  <h1>
    Rate
    <small>Create Rate</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li> <i class="fa fa-users"></i> Rate</li>
    <li class="active"> <i class="fa fa-percent"></i> Rate</li>
  </ol>
@stop

@section('content')
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title text-center">Create Rate</h3>
      </div>

      <div class="panel-body overflow-hidden">
        <form
                action="{{ route('rates.store') }}"
                method="POST"
                id="form"
                autocomplete="off"
        >

          {{ csrf_field() }}

          @include('layouts.Backend.Rates.form', [
           'submitButtonText' => 'Create',
           'rate' => new \App\Models\Rate,
           'rooms' => $rooms
          ])
        </form>
      </div>
    </div>

  </div>

@stop

  @section('js')

    <script>
        $('#room_id').select2();

    </script>
@stop