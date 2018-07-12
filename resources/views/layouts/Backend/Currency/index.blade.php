@extends('adminlte::page')

@section('title', 'Reservation System | Currencies')

@section('content_header')
    <h1>
        Currencies
        <small>Currencies Details</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-bitcoin"></i> Currencies</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success no-padding">
                <div class="box-header with-border">
                    <a href="{{ route('currencies.create') }}" class="btn btn-default btn-sm"><i
                                class="glyphicon glyphicon-plus">
                        </i> Currency</a>
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
                            <th>Currency Name</th>
                            <th>Code</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="panel-footer bg-gray-light">
                    Details of All Currencies
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
                        ajax: '{!! route('currencies.datatable') !!}',
                        columns: [
                            {data: 'name', name: 'name'},
                            {data: 'code', name: 'code'},
                            {data: 'created_at', name: 'created_at'},
                            {data: 'action', name: 'action'},
                        ]
                    });
                });
            </script>
@stop