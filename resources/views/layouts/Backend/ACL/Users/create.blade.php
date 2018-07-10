@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
  <h1>Users</h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-7 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title text-center">Create User Account</h3>
      </div>

      <div class="panel-body overflow-hidden">
        <form
                action="{{ route('users.store') }}"
                method="POST"
                id="form"
        >

          {{ csrf_field() }}

          @include('layouts.Backend.ACL.users.form', [
           'submitButtonText' => 'Create',
           'user' => new \App\User
          ])
        </form>
      </div>
    </div>

  </div>

@stop