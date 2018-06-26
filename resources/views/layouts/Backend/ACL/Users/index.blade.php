@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
  <h1>Dashboard</h1>
@stop

@section('content')

  <div class="col-md-12">
    <div class="box box-primary with-border no-padding">

      <div class="box-header ">
        <h3 class="box-title">Registered Users</h3>
        <div class="box-tools pull-left">
          <a href="{{ route('users.create') }}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-plus"></i>Create</a>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body ">
        <table class="table table-hover table-condensed">
          <thead>
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Date Created </th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-bars"></i></button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li><a href="{{ route('users.edit', $user->id) }}"><i class="glyphicon glyphicon-edit"></i>Edit Details</a></li>
                  <li><a onclick="return confirm('Are you sure ?')" href="{{ route('users.delete', $user->id) }}"><i class="glyphicon glyphicon-trash"></i>Delete Account</a></li>

                </ul>
              </div>
            </td>
            @endforeach
          </tr>
          </tbody></table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>

@stop