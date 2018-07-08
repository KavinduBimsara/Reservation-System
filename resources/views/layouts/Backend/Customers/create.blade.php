@extends('adminlte::page')

@section('title', 'Reservation System | Create Customer')

@section('content_header')
  <h1>Customers</h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-9 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title text-center">Create Customer</h3>
      </div>

      <div class="panel-body overflow-hidden">
        @foreach($errors->all() as $e)
          <l>{{ $e }}</l>
        @endforeach
        <form
                action="{{ route('customers.store') }}"
                method="POST"
                id="form"
        >

          {{ csrf_field() }}

          @include('layouts.Backend.Customers.form', [
           'submitButtonText' => 'Create',
           'customer' => new \App\Models\Customer
          ])
        </form>
      </div>
    </div>

  </div>

@stop