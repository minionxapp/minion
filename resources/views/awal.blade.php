<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/styles.css">
    <title>Minion Project</title>
</head>

<body style="background:#e2e8f0">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" style="border-top: 5px solid rgb(175, 140, 226);">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> MINION PROJECT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" arialabel="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-book-open" aria-hidden="true"></i> BERITA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-calendar" aria-hidden="true"></i> AGENDA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-image" aria-hidden="true"></i> GALERI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-video" aria-hidden="true"></i> VIDEO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-phone" aria-hidden="true"></i> KONTAK</a>
                    </li>
                </ul>
            </div>
            14
        </div>
    </nav>
    <!-- slider section -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="dist/img/minion/minion2.jpg" class="w-100">
            </div>
            <div class="carousel-item">
                <img src="dist/img/minion/minion3.jpg" class="w-100">
            </div>
            <div class="carousel-item">
                <img src="dist/img/minion/minion4.jpg" class="w-100">
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" dataslide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" dataslide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- end slider section -->
    <div class="container-fluid mt-3 mb-5">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <!-- berita section -->
                    <div class="col-md-12 mb-3">
                        <h4><i class="fas fa-book-open"></i> BERITA TERBARU</h4>
                    </div>
                    <div class="col-md-4 mb-4">
                        {{-- 15 --}}
                        <div class="card h-100 shadow-sm border-0 rounded-lg">
                            <div class="card-img">
                                <img src="dist/img/minion/seiya.jpg" class="w-100" style="height: 200px;object-fit:cover;border-top-left-radius: .3rem;border-top-right-radius: .3rem;">
                            </div>
                            <div class="card-body">
                                <a href="http://" class="text-dark textdecoration-none">
                                    <h6>Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</h6>
                                </a>
                            </div>
                            <div class="card-footer bg-white">
                                <i class="fa fa-calendar" ariahidden="true"></i> 09 Juli 2020
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm border-0 rounded-lg">
                            <div class="card-img">
                                <img src="dist/img/minion/minion2.jpg" class="w-100" style="height: 200px;object-fit:
cover;border-top-left-radius: .3rem;border-top-right-radius: .3rem;">
                            </div>
                            <div class="card-body">
                                <a href="http://" class="text-dark textdecoration-none">
                                    <h6>Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</h6>
                                </a>
                            </div>
                            <div class="card-footer bg-white">
                                <i class="fa fa-calendar" ariahidden="true"></i> 09 Juli 2020
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm border-0 rounded-lg">
                            <div class="card-img">
                                <img src="dist/img/post_image.png" class="w-100" style="height: 200px;object-fit:
cover;border-top-left-radius: .3rem;border-top-right-radius: .3rem;">
                            </div>
                            <div class="card-body">
                                <a href="http://" class="text-dark textdecoration-none">
                                    16
                                    <h6>Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</h6>
                                </a>
                            </div>
                            <div class="card-footer bg-white">
                                <i class="fa fa-calendar" ariahidden="true"></i> 09 Juli 2020
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm border-0 rounded-lg">
                            <div class="card-img">
                                <img src="dist/img/post_image.png" class="w-100" style="height: 200px;object-fit:
cover;border-top-left-radius: .3rem;border-top-right-radius: .3rem;">
                            </div>
                            <div class="card-body">
                                <a href="http://" class="text-dark textdecoration-none">
                                    <h6>Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</h6>
                                </a>
                            </div>
                            <div class="card-footer bg-white">
                                <i class="fa fa-calendar" ariahidden="true"></i> 09 Juli 2020
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm border-0 rounded-lg">
                            <div class="card-img">
                                <img src="dist/img/post_image.png" class="w-100" style="height: 200px;object-fit:
cover;border-top-left-radius: .3rem;border-top-right-radius: .3rem;">
                            </div>
                            <div class="card-body">
                                <a href="http://" class="text-dark textdecoration-none">
                                    <h6>Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</h6>
                                </a>
                            </div>
                            <div class="card-footer bg-white">
                                <i class="fa fa-calendar" ariahidden="true"></i> 09 Juli 2020
                            </div>
                        </div>
                    </div>
                    {{-- 17 --}}
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm border-0 rounded-lg">
                            <div class="card-img">
                                <img src="dist/img/post_image.png" class="w-100" style="height: 200px;object-fit:
cover;border-top-left-radius: .3rem;border-top-right-radius: .3rem;">
                            </div>
                            <div class="card-body">
                                <a href="http://" class="text-dark textdecoration-none">
                                    <h6>Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</h6>
                                </a>
                            </div>
                            <div class="card-footer bg-white">
                                <i class="fa fa-calendar" ariahidden="true"></i> 09 Juli 2020
                            </div>
                        </div>
                    </div>
                    <!-- end berita section -->
                    <!-- foto section -->
                    <div class="col-md-12 mb-3 mt-4">
                        <h4><i class="fas fa-images"></i> FOTO TERBARU</h4>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm border-0 rounded-lg">
                            <div class="card-img">
                                <img src="dist/img/post_image.png" class="w-100" style="height: 200px;object-fit:
cover;border-top-left-radius: .3rem;border-top-right-radius: .3rem;">
                            </div>
                            <div class="card-body">
                                <a href="http://" class="text-dark textdecoration-none">
                                    <h6>Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm border-0 rounded-lg">
                            <div class="card-img">
                                <img src="dist/img/post_image.png" class="w-100" style="height: 200px;object-fit: 
18
cover;border-top-left-radius: .3rem;border-top-right-radius: .3rem;">
                            </div>
                            <div class="card-body">
                                <a href="http://" class="text-dark textdecoration-none">
                                    <h6>Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- send foto section -->
                    <!-- video section -->
                    <div class="col-md-12 mb-3 mt-4">
                        <h4><i class="fas fa-video"></i> VIDEO TERBARU</h4>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm border-0 rounded-lg">
                            <div class="card-img">
                                <img src="dist/img/post_image.png" class="w-100" style="height: 200px;object-fit:
cover;border-top-left-radius: .3rem;border-top-right-radius: .3rem;">
                            </div>
                            <div class="card-body">
                                <a href="http://" class="text-dark textdecoration-none">
                                    <h6>Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm border-0 rounded-lg">
                            <div class="card-img">
                                <img src="dist/img/post_image.png" class="w-100" style="height: 200px;object-fit:
cover;border-top-left-radius: .3rem;border-top-right-radius: .3rem;">
                            </div>
                            <div class="card-body">
                                <a href="http://" class="text-dark textdecoration-none">
                                    <h6>Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- 19 --}}
                    <!-- end video section -->
                </div>
            </div>
            <div class="col-md-4">

                <!-- kategori section -->
                <div class="title mb-4 mt-5">
                    <h4><i class="fa fa-folder" aria-hidden="true"></i> Aplikasi</h4>
                </div>
                <div class="list-group">
                    <a href="https://g-leads.disprz.com" class="list-group-item list-group-item-action
border-0 shadow-sm mb-2 rounded" target="_blank"><i class="fa fa-folder-open" ariahidden="true"></i> G-Leads</a>
                    <a href="https://kms.pegadaian.co.id" class="list-group-item list-group-item-action
border-0 shadow-sm mb-2 rounded" target="_blank"><i class="fa fa-folder-open" ariahidden="true"></i> KMS</a>
                    <a href="" class="list-group-item list-group-item-action
border-0 shadow-sm mb-2 rounded"><i class="fa fa-folder-open" ariahidden="true"></i> BERITA</a>
                    <a href="" class="list-group-item list-group-item-action
border-0 shadow-sm mb-2 rounded"><i class="fa fa-folder-open" ariahidden="true"></i> INFO</a>
                </div>
                <!-- end kategori section -->

                <!-- agenda section -->
                <div class="title mb-4">
                    <h4><i class="fa fa-calendar" aria-hidden="true"></i> AGENDA TERBARU</h4>
                </div>
                <div class="card mb-3 shadow-sm border-0">
                    <div class="card-body">
                        <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h6>
                        <hr>
                        <div>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            Aula Sekolah
                        </div>
                        <div class="mt-2">
                            <i class="fa fa-calendar" aria-hidden="true"></i> 20
                            Juli 2020
                        </div>
                    </div>
                </div>
                <div class="card mb-3 shadow-sm border-0">
                    <div class="card-body">
                        <h6>Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit</h6>
                        <hr>
                        <div>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            Aula Sekolah
                        </div>
                        <div class="mt-2">
                            <i class="fa fa-calendar" aria-hidden="true"></i> 20
                            Juli 2020
                        </div>
                    </div>
                </div>
                <div class="card mb-3 shadow-sm border-0">
                    <div class="card-body">
                        <h6>Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit</h6>
                        <hr>
                        <div>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            Aula Sekolah
                        </div>
                        <div class="mt-2">
                            20
                            <i class="fa fa-calendar" aria-hidden="true"></i> 20
                            Juli 2020
                        </div>
                    </div>
                </div>
                <!-- end agenda section -->
                <!-- kategori section -->
                <div class="title mb-4 mt-5">
                    <h4><i class="fa fa-folder" aria-hidden="true"></i> KATEGORI BERITA</h4>
                </div>
                <div class="list-group">
                    <a href="" class="list-group-item list-group-item-action
border-0 shadow-sm mb-2 rounded"><i class="fa fa-folder-open" ariahidden="true"></i> OSIS</a>
                    <a href="" class="list-group-item list-group-item-action
border-0 shadow-sm mb-2 rounded"><i class="fa fa-folder-open" ariahidden="true"></i> PRAMUKA</a>
                    <a href="" class="list-group-item list-group-item-action
border-0 shadow-sm mb-2 rounded"><i class="fa fa-folder-open" ariahidden="true"></i> BERITA</a>
                    <a href="" class="list-group-item list-group-item-action
border-0 shadow-sm mb-2 rounded"><i class="fa fa-folder-open" ariahidden="true"></i> INFO</a>
                </div>
                <!-- end kategori section -->
            </div>
        </div>
    </div>
    <footer>
        <div class="container-fluid" style="background: white;">
            <div class="row p-4">
                <div class="col-md-4">
                    <h5>TENTANG</h5>
                    <hr>
                    <p>
                        This example is a quick exercise to illustrate how the
                        top-aligned navbar works. As you scroll, this navbar remains in its original
                        position.
                    </p>
                </div>
                <div class="col-md-4">
                    21
                    <h5>TAGS</h5>
                    <hr>
                    <button class="btn btn-sm btn-outline-secondary mb2">ISLAM</button>
                    <button class="btn btn-sm btn-outline-secondary mb2">BUDAYA</button>
                    <button class="btn btn-sm btn-outline-secondary mb2">OSIS</button>
                    <button class="btn btn-sm btn-outline-secondary mb2">KEGIATAN</button>
                    <button class="btn btn-sm btn-outline-secondary mb-2">KERJA
                        BAKTI</button>
                    <button class="btn btn-sm btn-outline-secondary mb2">PENGUMUMAN</button>
                    <button class="btn btn-sm btn-outline-secondary mb2">INFO</button>
                    <button class="btn btn-sm btn-outline-secondary mb2">PRAMUKA</button>
                </div>
                <div class="col-md-4">
                    <h5>KONTAK</h5>
                    <hr>
                    <p>
                        <i class="fa fa-map-marker" aria-hidden="true"></i> This
                        example is a quick exercise to illustrate how the top-aligned navbar works
                        <i class="fas fa-phone"></i> +62857-8585-2224
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark">
            <div class="row p-3">
                <div class="text-center text-white font-weight-bold">
                    Copyright © 2020 SMK INDONESIA. All rights reserved.
                </div>
            </div>
        </div>
    </footer>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>