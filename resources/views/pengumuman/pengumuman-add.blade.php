@extends('template.main')
@section('title', 'Tambah Pengumuman')
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
            <li class="breadcrumb-item"><a href="/pengumuman">Pengumuman</a></li>
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
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="text-right">
                <a href="/pengumuman" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                  Kembali
                </a>
              </div>
            </div>
            <form class="needs-validation" novalidate action="/pengumuman" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="judul">Judul Pengumuman</label>
                  <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Judul Pengumuman" value="{{ old('judul') }}" required>
                  @error('judul')
                  <span class="invalid-feedback text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="isi">Isi Pengumuman</label>
                  <textarea name="isi" id="isi" class="form-control @error('isi') is-invalid @enderror" cols="10" rows="5" placeholder="Isi Pengumuman" required>{{ old('isi') }}</textarea>
                  @error('isi')
                  <span class="invalid-feedback text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="kategori">Kategori Pengumuman</label>
                  <select name="kategori" id="kategori" class="form-control @error('kategori') is-invalid @enderror" required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    <option value="umum" {{ old('kategori') === 'umum' ? 'selected' : '' }}>Umum</option>
                    <option value="psb" {{ old('kategori') === 'psb' ? 'selected' : '' }}>PSB</option>
                  </select>
                  @error('kategori')
                  <span class="invalid-feedback text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="foto">Foto</label>
                  <input type="file" name="foto" class="form-control-file @error('foto') is-invalid @enderror" id="foto" accept="image/*">
                  @error('foto')
                  <span class="invalid-feedback text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="file">File</label>
                  <input type="file" name="file" class="form-control-file @error('file') is-invalid @enderror" id="file" accept=".doc,.docx,.xls,.xlsx,.pdf">
                  @error('file')
                  <span class="invalid-feedback text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-dark mr-1" type="reset"><i class="fa-solid fa-arrows-rotate"></i>
                  Reset</button>
                <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i>
                  Simpan</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.content -->
      </div>
    </div>
  </div>
</div>
<script>
  ClassicEditor
      .create( document.querySelector( '#isi' ) )
      .catch( error => {
          console.error( error );
      } );
</script>
@endsection
