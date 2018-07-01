@extends('adminlte::page')

@section('title', 'Reservation System | Users')

@section('content')

  <div class="col-md-12">
    <div class="box box-default with-border no-padding">

      <div class="box-header with-border">
        <a href="{{ route('users.create') }}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-plus"></i> User</a>
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
      <div class="box-body table-responsive">
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
      <div class="panel-footer">
        Registered Users
      </div>
    </div>
    <!-- /.box -->
  </div>

@stop

@section('js')

  <script>
      $(function () {
          $('#table').DataTable({
              processing: true,
              serverSide: true,
              responsive: true,
              ajax: '{!! route('users.datatable') !!}',
              columns: [
                  {data: 'name', name: 'name'},
                  {data: 'email', name: 'email'},
                  {data: 'created_at', name: 'created_at'},
                  {data: 'action', name: 'action'},
              ]

          });
      });
  </script>
@stop