@extends('template.main')
@section('title', 'Kelas')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-right">
                                <a href="/kelas/create" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah
                                    Kelas</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1"
                                class="table table-striped table-bordered table-hover text-center" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Kelas</th>
                                        <th>Jumlah Siswa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kelas as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nama_kelas }}</td>
                                        <td>{{ $data->jumlah_siswa }}</td>
                                        <td>
                                            <form class="d-inline" action="/kelas/{{ $data->id }}/edit"
                                                method="GET">
                                                <button type="submit" class="btn btn-success btn-sm mr-1">
                                                    <i class="fa-solid fa-pen"></i> Edit
                                                </button>
                                            </form>
                                            <form class="d-inline" action="/kelas/{{ $data->id }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    id="btn-delete"><i class="fa-solid fa-trash-can"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </div>
</div>

@endsection
