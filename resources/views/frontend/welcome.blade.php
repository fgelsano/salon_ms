@extends('layouts.app')
@section('content')
<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="user/img/salon.jpg" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h1 class="display-3 text-white mb-4 animated slideInDown">JCJ SALON</h1>
                        <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Services</a>
                        <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Book nOW</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="user/img/hair.jpg" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h1 class="display-3 text-white mb-4 animated slideInDown">BEAUTY SALON | SPA</h1>
                        <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Services</a>
                        <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">ABOUT US</h6>
            <h1 class="mb-5">Personnel In Charge</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="rounded shadow overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid mx-auto" src="user/img/annemarie.jpg" alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">Jessa Pabon</h5>
                        <small>HAIR</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="rounded shadow overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid mx-auto" src="user/img/burot.jpg" alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">Christian Mabia</h5>
                        <small>HAIRCUT</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="rounded shadow overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid mx-auto" src="user/img/arcilla.jpg" alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">Mary Jane Arcilla</h5>
                        <small>NAILS</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- services -->
<div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Our Services</h6>
                    <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Services</span></h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-hotel fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">HAIR</h5>
                            <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-utensils fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">HAIRCUT</h5>
                            <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-spa fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">NAILS</h5>
                            <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>


@endsection

@include('partials.userfooter')