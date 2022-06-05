@extends('layouts.admin.master')
@section('title')
    Daftar Companies
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


        @if ($pesan = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat !</strong> {{ $pesan }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::has('errors'))
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br />
                @endforeach
            </div>
        @endif

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="container-fluid">
                                        <a href="{{ route('admin.companies.buat') }}"
                                            class="btn btn-warning">Tambah</a>
                                    </div>
                                    <div class="container-fluid">
                                        <a href="{{ route('pdf.company') }}"
                                            class="btn btn-warning">Cetak Laporan Company</a>
                                    </div>
                                    <div class="container-fluid">
                                        <a href="{{ route('pdf.employees') }}" class="btn btn-warning">Cetak Laporan
                                            Employee</a>
                                    </div>
                                </div>
                                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example2"
                                                class="table table-bordered table-hover dataTable dtr-inline"
                                                aria-describedby="example2_info">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Company</th>
                                                        <th>Email</th>
                                                        <th>Balance</th>
                                                        <th>Logo</th>
                                                        <th>Web</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @php
                                                        $i = 1;
                                                    @endphp
                                                    @foreach ($data as $companies)
                                                        <tr>
                                                            <th scope="row">{{ $i++ }}</th>
                                                            <td>{{ $companies->nama }}</td>
                                                            <td>{{ $companies->email }}</td>
                                                            <td>{{ $companies->balance }}</td>
                                                            <td><img src="{{ asset('storage/app/company/' . $companies->logo) }}"
                                                                    alt="" width="50px"></td>
                                                            <td>{{ $companies->web }}</td>
                                                            <th>
                                                                <a href="{{ route('admin.companies.edit', $companies->id) }}"
                                                                    class="btn btn-warning btn-sm"><i
                                                                        class="fas fa-edit"></i></a>
                                                                <a href="{{ route('admin.companies.hapus', $companies->id) }}"
                                                                    class="btn btn-danger btn-sm"><i
                                                                        class="fas fa-trash"></i></a>
                                                                <a href="{{ route('admin.employees', $companies->slug_url) }}"
                                                                    class="btn btn-primary btn-sm"><i
                                                                        class="fas fa-plus-circle mr-2"></i>Employees</a>
                                                            </th>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th rowspan="1" colspan="1">Nama Company</th>
                                                        <th rowspan="1" colspan="1">Email</th>
                                                        <th rowspan="1" colspan="1">Balance</th>
                                                        <th rowspan="1" colspan="1">Logo</th>
                                                        <th rowspan="1" colspan="1">Web</th>
                                                        <th rowspan="1" colspan="1">Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                        <!-- /.card -->


                        <!-- /.card -->
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
