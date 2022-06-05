@extends('layouts.admin.master')
@section('title')
    Tambah Companies
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
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Input data Companies</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.companies.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Company</label>
                                        <input name="nama" type="text" class="form-control" id="exampleInputEmail1"
                                            value="" placeholder="Masukkan Nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                            value="" placeholder="Masukkan Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Balance</label>
                                        <input name="balance" type="number" class="form-control" id="exampleInputEmail1"
                                            value="" placeholder="Masukkan Balance">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Web</label>
                                        <input name="web" type="text" class="form-control" id="exampleInputEmail1"
                                            value="" placeholder="Masukkan Link Website">
                                    </div>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="customFile">Logo</label>
                                        <input name="logo" type="file" class="custom-file-input" id="customFile">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </form>
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
