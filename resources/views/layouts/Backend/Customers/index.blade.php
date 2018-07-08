@extends('adminlte::page')

@section('title', 'Reservation System | Customers')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success no-padding">

        <div class="box-header with-border">
          <a href="{{ route('customers.create') }}" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-plus"></i> Customer</a>
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
        <div class="panel-body table-hover table-condensed">
          <table class="table table-hover table-condensed " id="table">
            <thead>
            <tr>
              <th>Title</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Date Created</th>
              <th>Action</th>
            </tr>
            </thead>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer bg-gray-light">
          Registered Customers
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
              ajax: '{!! route('customers.datatable') !!}',
              columns: [
                  {data: 'title', name: 'title'},
                  {data: 'first_name', name: 'first_name'},
                  {data: 'last_name', name: 'last_name'},
                  {data: 'email', name: 'email'},
                  {data: 'created_at', name: 'created_at'},
                  {data: 'action', name: 'action'},
              ]

          });
      });
  </script>
@stop