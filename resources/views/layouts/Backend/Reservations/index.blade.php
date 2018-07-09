@extends('adminlte::page')

@section('title', 'Reservation System | Reservations')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success no-padding">

                <div class="box-header with-border">
                    <a href="{{ route('reservations.create') }}" class="btn btn-default btn-sm"><i
                                class="glyphicon glyphicon-plus"></i> Reservation</a>
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
                            <th>Reservation No.</th>
                            <th>Customer</th>
                            <th>Room No.</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer bg-gray-light">
                    Reservations Details
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
                ajax: '{!! route('reservations.datatable') !!}',
                columns: [
                    {data: 'reservation_number', name: 'reservation_number'},
                    {data: 'customer_id', name: 'customer_id'},
                    {data: 'rooms.0.room_no', name: 'rooms.room_no'},
                    {data: 'start_date', name: 'start_date'},
                    {data: 'end_date', name: 'end_date'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action'},
                ]

            });
        });
    </script>
@stop