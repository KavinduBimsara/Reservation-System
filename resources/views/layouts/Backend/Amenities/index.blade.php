@extends('adminlte::page')

@section('title', 'Reservation System | Amenities')

@section('content_header')
    <h1>
        Amenities
        <small>Amenities Details</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-wifi"></i>  Amenities</li>
    </ol>
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-success no-padding">

      <div class="box-header with-border">
        <a href="{{ route('amenities.create') }}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-plus"></i> Amenity</a>
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
      <div class="panel-body ">
        <table class="table table-hover table-condensed" id="table">
          <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Action</th>
          </tr>
          </thead>
        </table>
      </div>
      <!-- /.box-body -->
      <div class="panel-footer bg-gray-light">
        Details of All Amenities
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
              ajax: '{!! route('amenities.datatable') !!}',
              columns: [
                  {data: 'name', name: 'name'},
                  {data: 'description', name: 'description'},
                  {data: 'created_at', name: 'created_at'},
                  {data: 'updated_at', name: 'updated_at'},
                  {data: 'action', name: 'action'},
              ]
          });
      });
  </script>
@stop