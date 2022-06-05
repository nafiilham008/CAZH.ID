@extends('layouts.admin.master')
@section('title')
    Tambah Employee
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
                                <h3 class="card-title">Input data Employee</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.employees.simpan', $data->slug_url) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Lengkap</label>
                                        <input name="nama" type="text" class="form-control" id="exampleInputEmail1"
                                            value="" placeholder="Masukkan Nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Balance</label>
                                        <input name="balance" type="number" class="form-control" id="exampleInputEmail1"
                                            value="" placeholder="Tambah Balance">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>Select</label>
                                        <select class="form-control" name="company">
                                            @foreach ($data_company as $item)
                                                <option value="{{ $item->nama }}"> {{ $item->nama }} - {{ $item->id }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                            value="" placeholder="Masukkan Email">
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
