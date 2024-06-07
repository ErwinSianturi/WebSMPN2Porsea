@extends('template.main')
@section('title', 'Edit Guru')
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
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
                        <li class="breadcrumb-item"><a href="/guru">Guru</a></li>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-right">
                                <a href="/guru" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                                    Kembali
                                </a>
                            </div>
                        </div>
                        <form class="needs-validation" novalidate action="/guru/{{ $guru->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="NIP" value="{{ old('nip', $guru->nip) }}" required>
                                    @error('nip')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" placeholder="Nama Lengkap" value="{{ old('nama_lengkap', $guru->nama_lengkap) }}" required>
                                    @error('nama_lengkap')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin', $guru->jenis_kelamin) === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin', $guru->jenis_kelamin) === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" value="{{ old('tanggal_lahir', $guru->tanggal_lahir) }}" required>
                                    @error('tanggal_lahir')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Pendidikan Terakhir</label>
                                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Pendidikan Terakhir" value="{{ old('alamat', $guru->alamat) }}">
                                    @error('alamat')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" name="foto" class="form-control-file @error('foto') is-invalid @enderror" id="foto">
                                    @error('foto')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    @if ($guru->foto)
                                    <img src="{{ asset('foto/' . $guru->foto) }}" alt="Foto Guru" class="img-fluid mt-2" style="max-width: 200px;">
                                    @endif
                                </div>
                                <div class="form-group">
                                    {{-- <label for="jabatan">Jabatan</label> --}}
                                    <input type="hidden" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" placeholder="Jabatan" value="{{ old('jabatan', $guru->jabatan) }}">
                                    @error('jabatan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mata_pelajaran">Mata Pelajaran</label>
                                    <input type="text" name="mata_pelajaran" class="form-control @error('mata_pelajaran') is-invalid @enderror" id="mata_pelajaran" placeholder="Mata Pelajaran" value="{{ old('mata_pelajaran', $guru->mata_pelajaran) }}">
                                    @error('mata_pelajaran')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sambutan">Sambutan</label>
                                    <textarea name="sambutan" class="form-control @error('sambutan') is-invalid @enderror" id="sambutan" rows="3">{{ old('sambutan', $guru->sambutan) }}</textarea>
                                    @error('sambutan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    ClassicEditor
        .create( document.querySelector( '#sambutan' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
