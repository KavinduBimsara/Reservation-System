@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
  <h1>Dashboard</h1>
@stop

@section('content')
  <div class="row">

    @foreach($errors as $error)
      {{ $error }}
      @endforeach
    <div class="col-md-7 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Create new User Account</h3>
        </div>

        <div class="panel-body overflow-hidden">
          <form
                  action="{{ route('users.update', $user->id) }}"
                  method="POST"
                  id="form"
          >

            {{ csrf_field() }}
            {{ method_field('PUT') }}

            @include('layouts.Backend.ACL.users.form', [
             'submitButtonText' => 'Update',
             'user' => $user
            ])
          </form>
        </div>
      </div>

    </div>

@stop