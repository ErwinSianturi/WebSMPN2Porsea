@extends('template.main')
@section('title', 'Pengumuman')
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
                                <a href="/pengumuman/create" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Pengumuman</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover text-center" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Judul</th>
                                        <th>Isi</th>
                                        <th>Kategori</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengumuman as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->judul }}</td>
                                        <td>{!! $data->isi !!}</td>
                                        <td>{{ $data->kategori }}</td>
                                        <td>
                                            @if($data->foto)
                                                <img src="{{ asset('foto/'.$data->foto) }}" alt="Foto Pengumuman" style="width: 100px; height: auto;">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>
                                            <form class="d-inline" action="/pengumuman/{{ $data->id }}/edit" method="GET">
                                                <button type="submit" class="btn btn-success btn-sm mr-1"><i class="fa-solid fa-pen"></i> Edit</button>
                                            </form>
                                            <form class="d-inline" action="/pengumuman/{{ $data->id }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm" id="btn-delete"><i class="fa-solid fa-trash-can"></i> Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.content -->
    </div>
</div>

@endsection
