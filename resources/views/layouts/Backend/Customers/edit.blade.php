@extends('adminlte::page')

@section('title', 'Reservation System | Edit Customer')

@section('content_header')
  <h1>Customers</h1>
@stop

@section('content')
  <div class="row">
    <div class="col-md-9 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Edit Customer: {{ $customer->fullname }} </h3>
        </div>

        <div class="panel-body overflow-hidden">

          <form
                  action="{{ route('customers.update', $customer->slug) }}"
                  method="POST"
                  id="form"
          >

            {{ csrf_field() }}
            {{ method_field('PUT') }}

            @include('layouts.Backend.Customers.form', [
             'submitButtonText' => 'Update',
             'customer' => $customer
            ])
          </form>
        </div>
      </div>

    </div>

@stop