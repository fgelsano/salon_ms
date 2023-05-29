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
                            <a href="{{ route('bookings.createbooking') }}"
                                class="btn btn-light py-md-3 px-md-5 animated slideInRight">Book now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="user/img/hair.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h1 class="display-3 text-white mb-4 animated slideInDown">BEAUTY SALON | SPA</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Services</a>
                            <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight"
                                data-toggle="modal" data-target="#bookmodal">Book now</a>
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
    {{-- <div class="modal fade" id="bookmodal" tabindex="-1" role="dialog" aria-labelledby="newBookingsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 rounded-4">
            <div class="modal-header bg-primary text-white border-0 rounded-top">
                <h5 class="modal-title" id="exampleModalLabel">Adding New Bookings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container">
                <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="customer_name">Customer Name</label>
                        <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}">
                        @if ($errors->has('name'))
                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="employee_id">Employee Name</label>
                        <select name="employee_id" id="employee_id" class="form-control">
                            <option value="">--Select a Employee--</option>
                            @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Services Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">--Select a Services Category--</option>
                            @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="service_id">Services Name</label>
                        <select name="service_id" id="service_id" class="form-control">
                            <option value="">--Select a Services--</option>
                            @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="reservation_date">Reservation Date</label>
                        <input type="date" class="form-control" id="reservation_date" name="reservation_date" required>
                    </div>

                    <div class="form-group">
                        <label for="reservation_time">Reservation Time</label>
                        <input type="time" class="form-control" id="reservation_time" name="reservation_time" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="status" name="status" placeholder="Pending" required>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Create Booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
    <div class="container-xxl py-5" id="about">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">ABOUT US</h6>
                <h1 class="mb-5">Personnel In Charge</h1>
            </div>
            <div class="row g-4 d-flex justify-content-center">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded shadow overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid mx-auto" src="user/img/annemarie.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square btn-primary mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
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
                                <a class="btn btn-square btn-primary mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
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
                                <a class="btn btn-square btn-primary mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
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
    <div class="container-xxl py-5" id="services">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Our Services</h6>
                <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Services</span></h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="service-item rounded" href="">
                        <div class="service-icon bg-transparent border rounded p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-hotel fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">HAIR</h5>
                        <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                            stet diam sed stet lorem.</p>
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
                        <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                            stet diam sed stet lorem.</p>
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
                        <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                            stet diam sed stet lorem.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Add these links in the head section of your HTML -->
    <section class="gradient-custom" id="testimonials">
        <div class="container my-5 py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="text-center mb-4 pb-2">
                        <i class="fas fa-quote-left fa-3x text-white"></i>
                    </div>

                    <div class="card">
                        <div class="card-body px-4 py-5">
                            <!-- Carousel wrapper -->
                            <div id="carouselDarkVariant" class="carousel slide carousel-dark" data-ride="carousel">
                                <!-- Indicators -->
                                <ul class="carousel-indicators">
                                    <li data-target="#carouselDarkVariant" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselDarkVariant" data-slide-to="1"></li>
                                    <li data-target="#carouselDarkVariant" data-slide-to="2"></li>
                                </ul>

                                <!-- Inner -->
                                <div class="carousel-inner pb-5">
                                    <!-- Single item -->
                                    <div class="carousel-item active">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-10 col-xl-8">
                                                <div class="row">
                                                    <div class="col-lg-4 d-flex justify-content-center">
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp"
                                                            class="rounded-circle shadow-1 mb-4 mb-lg-0"
                                                            alt="woman avatar" width="150" height="150" />
                                                    </div>
                                                    <div
                                                        class="col-9 col-md-9 col-lg-7 col-xl-8 text-center text-lg-start mx-auto mx-lg-0">
                                                        <h4 class="mb-4">Maria Smantha</h4>
                                                        <p class="mb-0 pb-3">
                                                            I recently visited this salon for a haircut, and I must say it
                                                            was an amazing experience. The stylist was incredibly skilled
                                                            and understood exactly what I wanted. She took her time to
                                                            listen to my preferences and made helpful suggestions. The
                                                            haircut turned out even better than I had imagined! The salon
                                                            itself was clean and had a relaxing atmosphere.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single item -->
                                    <div class="carousel-item">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-10 col-xl-8">
                                                <div class="row">
                                                    <div class="col-lg-4 d-flex justify-content-center">
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp"
                                                            class="rounded-circle shadow-1 mb-4 mb-lg-0"
                                                            alt="woman avatar" width="150" height="150" />
                                                    </div>
                                                    <div
                                                        class="col-9 col-md-9 col-lg-7 col-xl-8 text-center text-lg-start mx-auto mx-lg-0">
                                                        <h4 class="mb-4">Lisa Cudrow</h4>
                                                        <p class="mb-0 pb-3">
                                                            I recently treated myself to a spa day at this salon, and it was
                                                            truly fantastic. From the moment I walked in, I was greeted with
                                                            warm smiles and made to feel welcome. The spa area was
                                                            beautifully decorated and had a calming ambiance. The massage
                                                            therapist was skilled and knowledgeable, delivering a truly
                                                            relaxing and rejuvenating massage. The facial treatment was also
                                                            excellent, leaving my skin feeling refreshed and glowing.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single item -->
                                    <div class="carousel-item">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-10 col-xl-8">
                                                <div class="row">
                                                    <div class="col-lg-4 d-flex justify-content-center">
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(9).webp"
                                                            class="rounded-circle shadow-1 mb-4 mb-lg-0"
                                                            alt="woman avatar" width="150" height="150" />
                                                    </div>
                                                    <div
                                                        class="col-9 col-md-9 col-lg-7 col-xl-8 text-center text-lg-start mx-auto mx-lg-0">
                                                        <h4 class="mb-4">John Smith</h4>
                                                        <p class="mb-0 pb-3">
                                                            I visited this salon for a manicure and pedicure, and I must say
                                                            the nail services were outstanding. The nail technicians were
                                                            highly skilled and paid great attention to detail. They took
                                                            their time to shape and file my nails precisely, and the end
                                                            results were simply stunning. The salon had a wide range of nail
                                                            polish colors to choose from, and the technician helped me find
                                                            the perfect shade.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Inner -->

                                <!-- Controls -->
                                <a class="carousel-control-prev" href="#carouselDarkVariant" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselDarkVariant" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <!-- Carousel wrapper -->
                        </div>
                    </div>

                    <div class="text-center mt-4 pt-2">
                        <i class="fas fa-quote-right fa-3x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="fixed-container"
        style="position: fixed;
        bottom: 20px;
        right: 20px;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        z-index: 1000;">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reviewModal"
            style="margin-bottom: 10px;">
            <i class="fas fa-pencil-alt" style="margin-right: 5px;"></i> Leave a Feedback
        </button>
    </div>
    <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewModalLabel">Customer Review Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="reviewForm">
                      <div class="form-group">
                        <label for="customerName">Customer's Name:</label>
                        <input type="text" class="form-control" id="customerName" placeholder="Enter customer's name" required>
                      </div>
                      <div class="form-group">
                        <label for="reviewContent">Content:</label>
                        <textarea class="form-control" id="reviewContent" rows="5" placeholder="Enter review content" required></textarea>
                      </div>
                      <div class="form-group">
                        <label for="starRating">Star Rating:</label>
                        <div class="rate">
                          <input type="radio" id="star5" name="rate" value="5" required>
                          <label for="star5" title="5 stars"><i class="fas fa-star"></i></label>
                          <input type="radio" id="star4" name="rate" value="4" required>
                          <label for="star4" title="4 stars"><i class="fas fa-star"></i></label>
                          <input type="radio" id="star3" name="rate" value="3" required>
                          <label for="star3" title="3 stars"><i class="fas fa-star"></i></label>
                          <input type="radio" id="star2" name="rate" value="2" required>
                          <label for="star2" title="2 stars"><i class="fas fa-star"></i></label>
                          <input type="radio" id="star1" name="rate" value="1" required>
                          <label for="star1" title="1 star"><i class="fas fa-star"></i></label>
                        </div>
                      </div><br><br>
                      <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Submit Review</button>
                    </form>
                  </div>

            </div>
        </div>
    </div>
@endsection
