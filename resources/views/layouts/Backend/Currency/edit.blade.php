@extends('adminlte::page')

@section('title', 'Reservation System | Currency | Edit ' . $currency->name)

@section('content')
  <div class="row">

    <div class="col-md-7 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Edit {{ $currency->name }} Currency</h3>
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
                  action="{{ route('currencies.update', $currency->id) }}" method="POST" id="form">
            {{ csrf_field() }}

            {{ method_field('PUT') }}

            @include('layouts.Backend.Currency.form', [
             'submitButtonText' => 'Update',
             'currency' => $currency
            ])
          </form>
        </div>
      </div>

    </div>

@stop