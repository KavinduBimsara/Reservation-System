@extends('adminlte::page')

@section('title', 'Reservation System | Create User')

@section('content_header')
  <h1>
    Users
    <small>Create User</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><i class="fa fa-users"></i> Users</li>
    <li class="active"><i class="fa fa-plus"></i> Create User</li>
  </ol>
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