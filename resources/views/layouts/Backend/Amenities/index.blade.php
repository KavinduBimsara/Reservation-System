@extends('adminlte::page')

@section('title', 'Reservation System | Amenities')

@section('content_header')
  <h1>Amenties</h1>
@stop

@section('content')

  <div class="col-md-12">
    <div class="box box-primary with-border no-padding">

      <div class="box-header ">
        <h3 class="box-title">All Amenities</h3>
        <div class="box-tools pull-left">
          <a href="{{ route('amenities.create') }}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-plus"></i>Create</a>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body ">
        <table class="table table-hover table-condensed">
          <thead>
          <tr>
            <th>name</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          @foreach($amenities as $amenities)
          <tr>
            <td>{{ $amenities->name }}</td>
            <td>{{ $amenities->description }}</td>
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-bars"></i></button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li><a href="{{ route('amenities.edit', $amenities->id) }}"><i class="glyphicon glyphicon-edit"></i>Edit </a></li>
                  <li><a onclick="return confirm('Are you sure ?')" href="#"><i class="glyphicon glyphicon-trash"></i>Delete</a></li>

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