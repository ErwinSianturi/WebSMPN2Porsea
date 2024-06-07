@extends('template.main')
@section('title', 'Tambah Sekolah')
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
            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
            <li class="breadcrumb-item"><a href="/sekolah">Sekolah</a></li>
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
                <a href="/sekolah" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                  Kembali
                </a>
              </div>
            </div>
            <form class="needs-validation" novalidate action="/sekolah" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="nama_sekolah">Nama Sekolah</label>
                      <input type="text" name="nama_sekolah" class="form-control @error('nama_sekolah') is-invalid @enderror" id="nama_sekolah" placeholder="Nama Sekolah" value="{{ old('nama_sekolah') }}" required>
                      @error('nama_sekolah')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="alamat_sekolah">Alamat Sekolah</label>
                      <textarea name="alamat_sekolah" id="alamat_sekolah" class="form-control @error('alamat_sekolah') is-invalid @enderror" cols="10" rows="5" placeholder="Alamat Sekolah" required>{{ old('alamat_sekolah') }}</textarea>
                      @error('alamat_sekolah')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="no_telp">Nomor Telepon</label>
                      <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="Nomor Telepon" value="{{ old('no_telp') }}" required>
                      @error('no_telp')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}" required>
                      @error('email')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  {{-- youtube, fb, ig, tiktok --}}
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="youtube">Youtube</label>
                      <input type="text" name="youtube" class="form-control @error('youtube') is-invalid @enderror" id="youtube" placeholder="Youtube" value="{{ old('youtube') }}" required>
                      @error('youtube')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="fb">Facebook</label>
                            <input type="text" name="fb" class="form-control @error('fb') is-invalid @enderror" id="fb" placeholder="Facebook" value="{{ old('fb') }}" required>
                            @error('fb')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="ig">Instagram</label>
                            <input type="text" name="ig" class="form-control @error('ig') is-invalid @enderror" id="ig" placeholder="Instagram" value="{{ old('ig') }}" required>
                            @error('ig')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tiktok">Tiktok</label>
                            <input type="text" name="tiktok" class="form-control @error('tiktok') is-invalid @enderror" id="tiktok" placeholder="Tiktok" value="{{ old('tiktok') }}" required>
                            @error('tiktok')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="visi">Visi</label>
                      <textarea name="visi" id="visi" class="form-control @error('visi') is-invalid @enderror" cols="10" rows="5" placeholder="Visi" required>{{ old('visi') }}</textarea>
                      @error('visi')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="misi">Misi</label>
                      <textarea name="misi" id="misi" class="form-control @error('misi') is-invalid @enderror" cols="10" rows="5" placeholder="Misi" required>{{ old('misi') }}</textarea>
                      @error('misi')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="profil_sekolah">Profil Sekolah</label>
                      <textarea name="profil_sekolah" id="profil_sekolah" class="form-control @error('profil_sekolah') is-invalid @enderror" cols="10" rows="5" placeholder="Profil Sekolah" required>{{ old('profil_sekolah') }}</textarea>
                      @error('profil_sekolah')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="tujuan_sekolah">Tujuan Sekolah</label>
                      <textarea name="tujuan_sekolah" id="tujuan_sekolah" class="form-control @error('tujuan_sekolah') is-invalid @enderror" cols="10" rows="5" placeholder="Tujuan Sekolah" required>{{ old('tujuan_sekolah') }}</textarea>
                      @error('tujuan_sekolah')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="filosofi_sekolah">Filosofi Sekolah</label>
                      <textarea name="filosofi_sekolah" id="filosofi_sekolah" class="form-control @error('filosofi_sekolah') is-invalid @enderror" cols="10" rows="5" placeholder="Filosofi Sekolah" required>{{ old('filosofi_sekolah') }}</textarea>
                      @error('filosofi_sekolah')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  {{-- <div class="row"> --}}
    <div class="col-lg-6">
        <div class="form-group">
            <label for="foto">Foto Sekolah</label>
            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto">
            @error('foto')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        {{-- </div> --}}
    </div>
</div>

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
      .create( document.querySelector( '#visi' ) )
      .catch( error => {
          console.error( error );
      } );

  ClassicEditor
      .create( document.querySelector( '#misi' ) )
      .catch( error => {
          console.error( error );
      } );
  ClassicEditor
      .create( document.querySelector( '#profil_sekolah' ) )
      .catch( error => {
          console.error( error );
      } );
  ClassicEditor
      .create( document.querySelector( '#tujuan_sekolah' ) )
      .catch( error => {
          console.error( error );
      } );
  ClassicEditor
      .create( document.querySelector( '#filosofi_sekolah' ) )
      .catch( error => {
          console.error( error );
      } );
</script>

@endsection
