<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $sekolah->nama_sekolah; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Lora:wght@400;700;family=Merriweather:wght@400;700&display=swap" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="{{ url('/index') }}" class="navbar-brand ml-lg-3">
                <p class="h3 m-0 text-uppercase text-primary">
                    <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="mr-3" style="height: 60px;">
                    <?php echo $sekolah->nama_sekolah; ?>
                                </p>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="{{ url('/index') }}" class="nav-item nav-link">Home</a>
                    <a href="{{ url('/program') }}" class="nav-item nav-link">Program</a>
                    <a href="{{ url('/berita') }}" class="nav-item nav-link active">Berita</a>
                    <a href="{{ url('/galerii') }}" class="nav-item nav-link">Galeri</a>
                    {{-- login --}}
                    <a href="{{ url('/login') }}" class="nav-item nav-link">Login</a>
                </div>

            </div>
        </nav>
    </div>
    <!-- Navbar End -->

 <div class="container py-5">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <img class="card-img-top mb-4" src="{{ asset('foto/' . $pengumuman->foto) }}" alt="{{ $pengumuman->judul }}">
            <div class="card-body  semua-jus">
                <h2 class="card-title text-center">{{ $pengumuman->judul }}</h2>
                <?php
                // Pisahkan isi konten menjadi paragraf
                $paragraphs = explode("\n", $pengumuman->isi);
                foreach ($paragraphs as $paragraph) {
                    echo "<p>$paragraph</p>";
                }

                // Periksa apakah pengumuman memiliki file terlampir
                if ($pengumuman->file) {
                    $fileName = basename($pengumuman->file); // Ambil nama file dari path
                    echo "<p>File: $fileName</p>";
                    echo "<a href='" . asset('files/' . $pengumuman->file) . "' class='btn btn-primary' target='_blank'>Buka File</a>"; // Mengubah teks tombol menjadi "Buka File"
                }
                ?>
            </div>
        </div>
    </div>
</div>




<!-- Footer Start -->
<div class="container-fluid position-relative overlay-top" style="margin-top: 90px; background-color: #4b9df5; color: white;">
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-md-6 mb-5  semua-jus">
                <a href="{{ url('/') }}" class="navbar-brand">
                    <h1 class="mt-n2 text-uppercase text-white"><i class="fa fa-book-reader mr-3"></i>{{ $sekolah->nama_sekolah }}</h1>
                </a>
                <p class="m-0">{!! $sekolah->profil_sekolah !!}</p>
            </div>


            <div class="col-md-4 mb-4">
                <h3 class="text-white mb-4">Kontak</h3>
                <p><i class="fa fa-map-marker-alt mr-2"></i>{{ $sekolah->alamat_sekolah }}</p>
                <p><i class="fa fa-phone-alt mr-2"></i>{{ $sekolah->no_telp }}</p>
                <p><i class="fa fa-envelope mr-2"></i>{{ $sekolah->email }}</p>
                {{-- youtube, fb, ig, tiktok --}}
                <a href="{{ $sekolah->youtube }}" class="text-dark mr-2"><i class="fab fa-youtube"></i> {{ $sekolah->youtube }}</a>
                <a href="{{ $sekolah->fb }}" class="text-dark mr-2"><i class="fab fa-facebook"></i> {{ $sekolah->fb }}</a>
                <a href="{{ $sekolah->ig }}" class="text-dark mr-2"><i class="fab fa-instagram"></i> {{ $sekolah->ig }}</a>
                {{-- a style none --}}
                <a href="{{ $sekolah->tiktok }}" class="text-dark mr-2 "><i class="fab fa-tiktok"></i>Tiktok:  {{ $sekolah->tiktok }}</a>

            </div>
            <div class="col-md-2 mb-5">
                <h3 class="text-white mb-4">Navigasi</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="{{ url('/index') }}"><i class="fa fa-angle-right mr-2"></i>Home</a>
                    <a class="text-white mb-2" href="{{ url('/program') }}"><i class="fa fa-angle-right mr-2"></i>Program</a>
                    <a class="text-white mb-2" href="{{ url('/berita') }}"><i class="fa fa-angle-right mr-2"></i>Berita</a>
                    <a class="text-white mb-2" href="{{ url('/galerii') }}"><i class="fa fa-angle-right mr-2"></i>Galeri</a>
                </div>
            </div>

            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-primary text-white-50 border-top py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
    <div class="container">
        <div class="row">
        </div>
    </div>
</div>

<!-- Footer End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
