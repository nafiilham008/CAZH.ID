@extends('layouts.admin.master')
@section('title')
    History
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="container-fluid">
                                    <a href="{{ route('pdf.history') }}" class="btn btn-warning">Cetak Laporan History</a>
                                </div>
                                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example2"
                                                class="table table-bordered table-hover dataTable dtr-inline"
                                                aria-describedby="example2_info">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>ID Company</th>
                                                        <th>ID Employee</th>
                                                        <th>Balance</th>
                                                        <th>Company Start Balance</th>
                                                        <th>Company Last Balance</th>
                                                        <th>Employees Start Balance</th>
                                                        <th>Employees Last Balance</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $i = 1;
                                                    @endphp
                                                    @foreach ($data as $item)
                                                        <tr>
                                                            <th scope="row">{{ $i++ }}</th>
                                                            <td>{{ $item->id_company }}</td>
                                                            <td>{{ $item->id_employee }}</td>
                                                            <td>{{ $item->balance }}</td>
                                                            <td>{{ $item->company_start_balance }}</td>
                                                            <td>{{ $item->company_last_balance }}</td>
                                                            <td>{{ $item->employees_start_balance }}</td>
                                                            <td>{{ $item->employees_last_balance }}</td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th rowspan="1" colspan="1">ID Company</th>
                                                        <th rowspan="1" colspan="1">ID Employee</th>
                                                        <th rowspan="1" colspan="1">Balance</th>
                                                        <th rowspan="1" colspan="1">Company Start Balance</th>
                                                        <th rowspan="1" colspan="1">Company Last Balance</th>
                                                        <th rowspan="1" colspan="1">Employees Start Balance</th>
                                                        <th rowspan="1" colspan="1">Employees Last Balance</th>

                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('css-tambahan')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
