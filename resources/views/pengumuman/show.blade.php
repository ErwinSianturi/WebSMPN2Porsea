<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $sekolah->nama_sekolah }}</title>
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
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-uppercase text-primary">
                    <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="mr-3" style="height: 60px;">
                    {{ $sekolah->nama_sekolah }}
                </h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="index" class="nav-item nav-link">Home</a>
                    <a href="program" class="nav-item nav-link">Program</a>
                    <a href="berita" class="nav-item nav-link active">Berita</a>
                    <a href="galerii" class="nav-item nav-link">Galeri</a>
                </div>

            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px; background-image: url('{{ asset('assets/PAGARDEPANSEKOLAH.jpg') }}'); background-size: cover; background-position: center bottom;">
        <div class="container text-center my-5 py-5">
            <h1 class="text-white display-1 mb-5">Berita</h1>
            <h1 class="display-4 text-white mt-4 mb-3" style="font-size: 3rem;">{{ $sekolah->nama_sekolah }}</h1>
        </div>
    </div>
    <!-- Header End -->    

    <!-- Detail Pengumuman Start -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <img src="{{ asset('foto/' . $pengumuman->foto) }}" class="card-img-top" alt="{{ $pengumuman->judul }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $pengumuman->judul }}</h5>
                        <p class="card-text">{!! $pengumuman->isi !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail Pengumuman End -->

    <!-- Footer Start -->
    <div class="container-fluid position-relative overlay-top" style="margin-top: 90px; background-color: #007bff; color: white;">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <a href="index" class="navbar-brand">
                        <h1 class="mt-n2 text-uppercase text-white"><i class="fa fa-book-reader mr-3"></i>{{ $sekolah->nama_sekolah }}</h1>
                    </a>
                    <p class="m-0">{!! $sekolah->profil_sekolah !!}</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h3 class="text-white mb-4">Kontak</h3>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>{{ $sekolah->alamat_sekolah }}</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>{{ $sekolah->no_telp }}</p>
                    <p><i class="fa fa-envelope mr-2"></i>{{ $sekolah->email }}</p>
                </div>
                <div class="col-md-2 mb-5">
                    <h3 class="text-white mb-4">Navigasi</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white mb-2" href="index"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-white mb-2" href="program"><i class="fa fa-angle-right mr-2"></i>Program</a>
                        <a class="text-white mb-2" href="berita"><i class="fa fa-angle-right mr-2"></i>Berita</a>
                        <a class="text-white mb-2" href="galerii"><i class="fa fa-angle-right mr-2"></i>Galeri</a>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
