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
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Lora:wght@400;700;family=Merriweather:wght@400;700&display=swap"
        rel="stylesheet">
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
                    <a href="index" class="nav-item nav-link active">Home</a>
                    <a href="program" class="nav-item nav-link">Program</a>
                    <a href="berita" class="nav-item nav-link">Berita</a>
                    <a href="galerii" class="nav-item nav-link">Galeri</a>
                    <a href="{{ url('/login') }}" class="nav-item nav-link">Login</a>
                </div>

        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    {{-- background ditutupi warna hitam aga transaparn --}}
    <div class="jumbotron jumbotron-fluid position-relative"
        style="margin-bottom: 90px; background-image: url('{{ asset('assets/PAGARDEPANSEKOLAH.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <!-- Overlay for semi-transparent black background -->
        <div class="overlay rounded-lg"></div>
        <!-- Text with shadow -->
        <div class="container text-center my-5 py-5 position-relative">
            <h1 class="display-1 mb-1 font-weight-bold text-shadow text-uppercase" style="color: rgb(255, 0, 0)">Selamat
                Datang di</h1>
            <h1 class="display-3 text-uppercase mb-3" style="color: #FAF5FF"><?php echo $sekolah->nama_sekolah; ?></h1>
        </div>
    </div>

    <style>
        .overlay {
            /* default styles for the overlay */
            display: block;
            background: rgba(0, 0, 0, 0.5);
            /* Example background, adjust as needed */
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        @media (min-width: 768px) {
            .overlay {
                display: none;
            }
        }
    </style>

    <div class="container-fluid py-5"style="margin-top:-80px">
        <div class="container py-5 filosofi">
            <p class="semua-jus"> {!! $sekolah->profil_sekolah !!}</p>
            <div class="row" style="margin-top:30px;">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="{{ asset('foto/' . $guru->foto) }}"
                            style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7 d-flex flex-column justify-content-center">
                    <div class="text-content p-4">
                        <p class="semua-jus"
                            style="max-height: 500px; overflow: auto; white-space: pre-line; overflow-wrap: break-word; word-wrap: break-word;">
                            {!! $guru->sambutan !!}
                        </p>
                    </div>
                </div>
            </div>

            <style>
                .position-relative {
                    border-radius: 8px;
                    overflow: hidden;
                }

                .text-content {
                    max-width: 100%;
                    background-color: rgba(216, 232, 249, 0.689);
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    border-radius: 8px;
                }

                @media (max-width: 767px) {
                    .text-content {
                        padding: 20px;
                        /* More padding for mobile view */
                    }
                }
            </style>



            <!-- About End -->
            <div class="container-fluid py-5">
                <div class="container py-5">
                    <div class="row mx-0 justify-content-center">
                        <div class="col-lg-10">
                            <div class="section-title text-center position-relative mb-5">
                                <h1 class="display-4"> <span style="color: rgb(87, 84, 84);">Berkenalan </span> Lebih
                                    dalam</h1>
                                <h6
                                    class="display-4 d-inline-block position-relative text-secondary text-uppercase pb-2">
                                    Tak Kenal Maka Tak Sayang </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feature Start -->
        <div class="container-fluid bg-image" style="margin: 90px 0; margin-top: -30px;">
            <div class="row">
                <div class="col-lg-12 my-5 pt-5 pb-lg-5">
                    <h3 class="text-primary">Filosofi Sekolah</h3>

                    <div class="filosofi mb-4 pb-2 semua-jus">
                        <p class="semua-jus">{!! $sekolah->filosofi_sekolah !!}</p>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: -200px;">
                <div class="col-lg-12 my-5 pt-5 pb-lg-5">
                    <h3 class="text-primary">Tujuan Sekolah</h3>
                    <div class="filosofi mb-4 pb-2 semua-jus">
                        <p class="semua-jus">{!! $sekolah->tujuan_sekolah !!}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feature Start -->

        <div class="container-fluid bg-image" style="margin: 90px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6" style="">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-95 h-95" src="{{ asset('foto/' . $sekolah->foto) }}"
                                style="object-fit: cover; border-radius: 10px;">
                        </div>
                    </div>
                    <div class="col-lg-6 my-5 pt-5 pb-lg-5">
                        <div class="section-title position-relative mb-4">

                            <h1 class="display-4 text-primary">Visi</h1>
                        </div>
                        <center>
                            <div class="visi-misi mb-4 pb-2 semua-jus">
                                <p class="semua-jus">{!! $sekolah->visi !!}</p>
                            </div>
                        </center>
                        <div class="section-title position-relative mb-4">

                            <h1 class="display-4 text-primary">Misi</h1>
                        </div>
                        <div class="d-flex mb-3">

                            <div class="visi-misi mt-n1 semua-jus">
                                <p class="semua-jus">{!! $sekolah->misi !!}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <center>
            <h1 class="display-4">STATISTIK</h1>
            <h1 class="display-4">Informasi Data Sekolah</h1>
        </center>
        <div class="row pt-3 mx-0">
            <div class="col-4 px-0">
                <div class="bg-success text-center p-4">
                    {{-- <div class="btn-icon bg-secondary mr-4"> --}}
                    <i class="fa fa-2x fa-building text-white"></i>

                    <br>
                    <h1 class="text-white" data-toggle="counter-up">{{ $jumlah_kelas }}</h1>
                    {{-- </div> --}}
                    <h6 class="text-uppercase text-white">Ruang Kelas</h6>
                </div>
            </div>
            <div class="col-4 px-0">
                <div class="bg-primary text-center p-4">
                    {{-- <div class="btn-icon bg-secondary mr-4"> --}}
                    <i class="fa fa-2x fa-graduation-cap text-white"></i>
                    <br>
                    <h1 class="text-white" data-toggle="counter-up">{{ $jumlah_siswas }}</h1>
                    {{-- </div> --}}
                    <h6 class="text-uppercase text-white">Jumlah Siswa</h6>
                </div>
            </div>

            <div class="col-4 px-0">
                <div class="bg-warning text-center p-4">
                    <i class="fa fa-2x fa-book-reader text-white"></i>
                    <h1 class="text-white" data-toggle="counter-up">{{ $jumlah_guru }}</h1>
                    <h6 class="text-uppercase text-white">Jumlah Guru</h6>
                </div>
            </div>
        </div>


        <!-- Team Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="section-title text-center position-relative mb-5">
                    <h1 class="display-4">Jajaran Pengurus</h1>
                </div>
                <div class="owl-carousel team-carousel position-relative" style="padding: 0 30px;">
                    @foreach ($tatausaha as $data)
                        <div class="team-item sama-sama">
                            <div class="card h-100 shadow">
                                <div class="card-header">
                                    <img src="{{ asset('foto/' . $data->foto) }}" class="card-img-top" alt="..."
                                        style="height: 300px; object-fit: cover;">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title mb-1">{{ $data->nama_lengkap }}</h6>
                                    <p class="card-text mb-1">{{ $data->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Team End -->




    </div>
    </div>
    </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid position-relative overlay-top"
        style="margin-top: 90px; background-color: #4b9df5; color: white;">
        <br>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 mb-5 semua-jus">
                    <a href="index" class="navbar-brand">
                        <h1 class="text-uppercase text-white"><i
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
                            width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <p><i class="fa fa-phone-alt mr-2"></i><?php echo $sekolah->no_telp; ?></p>
                    <p><i class="fa fa-envelope mr-2"></i><?php echo $sekolah->email; ?></p>
                    <div class="d-flex flex-wrap">
                        <a href="{{ $sekolah->youtube }}" class="text-dark mr-2 mb-2"><i class="fab fa-youtube"></i>
                            Youtube</a>
                        <a href="{{ $sekolah->fb }}" class="text-dark mr-2 mb-2"><i class="fab fa-facebook"></i>
                            Facebook</a>
                        <a href="{{ $sekolah->ig }}" class="text-dark mr-2 mb-2"><i class="fab fa-instagram"></i>
                            Instagram</a>
                        <a href="{{ $sekolah->tiktok }}" class="text-dark mr-2 mb-2"><i class="fab fa-tiktok"></i>
                            Tiktok</a>
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
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i
            class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        // atur agar class sama-sama memiliki tinggi yang sama
        $(document).ready(function() {
            var tinggi = 0;
            $('.sama-sama').each(function() {
                if ($(this).height() > tinggi) {
                    tinggi = $(this).height();
                }
            });
            $('.sama-sama').height(tinggi);
        });
    </script>
</body>

</html>
