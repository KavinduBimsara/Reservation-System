@extends('adminlte::page')

@section('title', 'Reservation System | Currency - Create')


@section('content')
  <div class="row">
    <div class="col-md-7 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Create new Currency</h3>
        </div>

        <div class="panel-body overflow-hidden">
          <form
             action="{{ route('currencies.store') }}" method="POST" id="form">
              {{ csrf_field() }}

            @include('layouts.Backend.Currency.form', [
             'submitButtonText' => 'Create',
             'currency' => new \App\Models\Currency,
            ])

          </form>
        </div>
      </div>

    </div>

@stop