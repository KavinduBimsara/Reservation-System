@extends('adminlte::page')

@section('title', 'Reservation System | Edit User')

@section('content_header')
  <h1>
    Users
    <small>Create User</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-users"></i> Users</li>
    <li class="active">Edit User</li>
  </ol>
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