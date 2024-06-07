<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SMP 2 PORSEA - Galeri</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Lora:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #F8F8FF
        }
        h1 {
            font-family: 'Lora', serif;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
        }
        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body>

    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index" class="navbar-brand ml-lg-3">
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
                    <a href="index" class="nav-item nav-link">Home</a>
                    <a href="program" class="nav-item nav-link">Program</a>
                    <a href="berita" class="nav-item nav-link">Berita</a>
                    <a href="galerii" class="nav-item nav-link active">Galeri</a>
                    <a href="{{ url('/login') }}" class="nav-item nav-link">Login</a>
                </div>

            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid position-relative" style="margin-bottom: 90px; background-image: url('{{ asset('assets/PAGARDEPANSEKOLAH.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <!-- Overlay for semi-transparent black background -->
        <div class="overlay rounded-lg"></div>
        <!-- Text with shadow -->
        <div class="container text-center my-5 py-5 position-relative">
            <h1 class="text-white display-1 mb-1 font-weight-bold text-shadow text-uppercase">Galeri</h1>
            <h1 class="display-3 text-uppercase text-white mb-3"><?php echo $sekolah->nama_sekolah; ?></h1>
        </div>
    </div>

    <!-- Header End -->

    <div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row mx-0 justify-content-center mb-2">
            <div class="col-lg-8">
                <div class="section-title text-center position-relative">
                    <h1 class="display-4">Galeri</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($galeri as $galeris)
            <div class="col-lg-4 col-md-6 col-sm-12 mt-2 d-flex">
                <div class="card h-100 shadow">
                    <img src="{{ asset('foto/' . $galeris->foto) }}" class="card-img-top" alt="..." style="height: 250px; object-fit: cover;">
                    <div class="card-body semua-jus">
                        <h5 class="card-title mb-1">{{ $galeris->judul }}</h5>
                        <p class="card-text mb-1">{!! $galeris->deskripsi !!}</p>
                    </div>
                    <div class="card-footer text-center">
                        @if ($galeris->video != '' && $galeris->video != null)
                        <a target="_blank" href="{{ asset('video/' . $galeris->video) }}" class="btn btn-primary rounded">Lihat/Unduh Video</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


   <!-- Footer Start -->
   <div class="container-fluid position-relative overlay-top"
   style="margin-top: 90px; background-color: #4b9df5; color: white;">
   <br>
   <div class="container mt-5 pt-5">
       <div class="row">
           <div class="col-md-6 mb-5 semua-jus">
               <a href="index" class="navbar-brand">
                   <h1 class="mt-n2 text-uppercase text-white"><i
                           class="fa fa-book-reader mr-3"></i><?php echo $sekolah->nama_sekolah; ?></h1>
               </a>
               <p class="m-0 semua-jus"> {!! $sekolah->profil_sekolah !!}</p>
           </div>


           <div class="col-md-4 mb-4">
               <h3 class="text-white mb-4">Kontak</h3>
               <p><i class="fa fa-map-marker-alt mr-2"></i><?php echo $sekolah->alamat_sekolah; ?></p>
               <div class="mb-4">
                   <iframe
                       src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d996.5452383983583!2d99.15227816962634!3d2.4467388397280776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031ffc8948bec9f%3A0xdfc23826007ad51c!2sC5W3%2BM5V%2C%20Ps.%20Porsea%2C%20Kec.%20Porsea%2C%20Toba%2C%20Sumatera%20Utara!5e0!3m2!1sen!2sid!4v1717467217664!5m2!1sen!2sid"
                       width="100%"
                       height="200"
                       style="border:0;"
                       allowfullscreen=""
                       loading="lazy"
                       referrerpolicy="no-referrer-when-downgrade">
                   </iframe>
               </div>
               <p><i class="fa fa-phone-alt mr-2"></i><?php echo $sekolah->no_telp; ?></p>
               <p><i class="fa fa-envelope mr-2"></i><?php echo $sekolah->email; ?></p>
               <div class="d-flex flex-wrap">
                   <a href="{{ $sekolah->youtube }}" class="text-dark mr-2 mb-2"><i class="fab fa-youtube"></i> Youtube</a>
                   <a href="{{ $sekolah->fb }}" class="text-dark mr-2 mb-2"><i class="fab fa-facebook"></i> Facebook</a>
                   <a href="{{ $sekolah->ig }}" class="text-dark mr-2 mb-2"><i class="fab fa-instagram"></i> Instagram</a>
                   <a href="{{ $sekolah->tiktok }}" class="text-dark mr-2 mb-2"><i class="fab fa-tiktok"></i> Tiktok</a>
               </div>
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
</div>
<div class="container-fluid bg-primary text-white-50 border-top py-4"
   style="border-color: rgba(256, 256, 256, .1) !important;">
   <div class="container">
       <div class="row">
           {{-- <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
           <p class="m-0">Copyright &copy; <a class="text-white" href="#">Your Site Name</a>. All Rights Reserved.
           </p>
       </div> --}}
           {{-- <div class="col-md-6 text-center text-md-right">
           <p class="m-0">Designed by <a class="text-white" href="https://htmlcodex.com">HTML Codex</a>
           </p>
       </div> --}}
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
