@extends('adminlte::page')

@section('title', 'Reservation System | Users')

@section('content_header')
    <h1>
        Users
        <small>Users Details</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-users"></i>  Users</li>
    </ol>
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-success no-padding">

      <div class="box-header with-border">
        <a href="{{ route('users.create') }}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-plus"></i> User</a>
        <div class="box-tools pull-left">

          <div class="btn-group btn-group-sm">
            <button type="button" class="btn btn-default btn-md dropdown-toggle" data-toggle="dropdown"
                    aria-expanded="false">
              <i class="fa fa-bars"></i>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">

              <li><a href=""><i class="glyphicon glyphicon-export"></i>Export</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="panel-body table-hover table-condensed">
        <table class="table table-hover table-condensed " id="table">
          <thead>
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Date Created</th>
            <th>Action</th>
          </tr>
          </thead>
        </table>
      </div>
      <!-- /.box-body -->
      <div class="box-footer bg-gray-light">
        Registered Users
      </div>
    </div>
    <!-- /.box -->
  </div>
</div>
@stop

@section('js')

  <script>

      $(function () {
          $('#table').DataTable({
              processing: true,
              serverSide: true,
              responsive: true,
              "pageLength": 50,
              ajax: '{!! route('users.datatable') !!}',
              columns: [
                  {data: 'name', name: 'name'},
                  {data: 'email', name: 'email'},
                  {data: 'created_at', name: 'created_at'},
                  {data: 'action', name: 'action'},
              ],

          });
      });
  </script>
@stop