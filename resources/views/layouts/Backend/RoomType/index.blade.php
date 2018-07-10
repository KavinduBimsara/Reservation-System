@extends('adminlte::page')

@section('title', 'Reservation System | Room Type')

@section('content_header')
    <h1>
        Room Types
        <small>Room Types Details</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"> <i class="fa fa-clone"></i> Room Types</li>
    </ol>
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-success with-border no-padding">

      <div class="box-header with-border">
        <a href="{{ route('room-type.create') }}" class="btn btn-default btn-sm"><i
                  class="glyphicon glyphicon-plus"></i> Room Type</a>
        <div class="box-tools pull-left">

          <div class="btn-group">
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
      <div class="panel-body ">
        <table class="table table-hover table-condensed" id="table">
          <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Capacity</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Action</th>
          </tr>
          </thead>
        </table>
      </div>
      <!-- /.box-body -->
      <div class="panel-footer bg-gray-light">
        Details of All Rooms Types
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
              ajax: '{!! route('room-type.datatable') !!}',
              columns: [
                  {data: 'name', name: 'name'},
                  {data: 'description', name: 'description'},
                  {data: 'capacity', name: 'capacity'},
                  {data: 'created_at', name: 'created_at'},
                  {data: 'updated_at', name: 'updated_at'},
                  {data: 'action', name: 'action'},
              ]
          });
      });
  </script>
@stop