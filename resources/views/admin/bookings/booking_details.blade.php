@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">{{ __('Booking Details') }} #{{ $bookings->id }}</h5>
                    </div>
                    <div class="container">
                        <div class="team-single">
                            <div class="row">
                                <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                                    <div class="team-single-img">
                                        <br>
                                        <ul class="clearfix">
                                            <?php
                                            use App\Models\Employee;
                                            $employees = Employee::all();
                                            $employeeCounter = 0;
                                            foreach ($employees as $employee) {
                                                if ($employeeCounter === 1) {
                                                    break;
                                                }
                                                $employeeCounter++;
                                            ?>

                                                <?php $employeeData = Employee::where('employee_name', $bookings->employee_name)->first(); ?>
                                                <img src="{{ asset('uploads/' . $employeeData->picture) }}" alt="User Image"
                                                    class="text-center" style="width: 300px; height: auto;">

                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div
                                        class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                                        <h4
                                            class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600">
                                            Employee</h4>
                                        <div class="margin-20px-top team-single-icons">
                                            <ul class="no-margin">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                <a hreff="#"><i class="fab fa-twitter"></i></a>
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <br><br>
                                <div class="col-lg-8 col-md-7">
                                    <div class="team-single-text padding-50px-left sm-no-padding-left">
                                        <h4 class="font-size38 sm-font-size32 xs-font-size30">{{ $bookings->employee_name }}</h4>
                                        <br>
                                        <div class="contact-info-section margin-40px-tb">
                                            <ul class="list-style9 no-margin">
                                                <li>

                                                    <div class="row">
                                                        <div class="col-md-5 col-5">
                                                            <i class="fas fa-users text-orange"></i>
                                                            <strong class="margin-10px-left text-orange">Customer name:</strong>
                                                        </div>
                                                        <div class="col-md-7 col-7">
                                                            {{ $bookings->firstname }}
                                                        </div>
                                                    </div>

                                                </li>
                                                <br>
                                                <li>

                                                    <div class="row">
                                                        <div class="col-md-5 col-5">
                                                            <i class="far fa-gem text-yellow"></i>
                                                            <strong class="margin-10px-left text-yellow">Service Name: </strong>
                                                        </div>
                                                        <div class="col-md-7 col-7">
                                                            {{ $bookings->name }}
                                                        </div>
                                                    </div>

                                                </li>
                                                <br>
                                                <li>

                                                    <div class="row">
                                                        <div class="col-md-5 col-5">
                                                            <i class="far fa-calendar text-danger"></i>
                                                            <strong class="margin-10px-left text-lightred">Reservation Date:</strong>
                                                        </div>
                                                        <div class="col-md-7 col-7">
                                                            {{ $bookings->reservation_date }}
                                                        </div>
                                                    </div>

                                                </li>
                                                <br>
                                                <li>

                                                    <div class="row">
                                                        <div class="col-md-5 col-5">
                                                            <i class="fas fa-calendar-times text-green"></i>
                                                            <strong class="margin-10px-left text-green">Reservation Time:</strong>
                                                        </div>
                                                        <div class="col-md-7 col-7">
                                                            {{ $bookings->reservation_time }}
                                                        </div>
                                                    </div>

                                                </li>
                                                <br>
                                                <li>

                                                    <div class="row">
                                                        <div class="col-md-5 col-5">
                                                            <i class="fas fa-mobile-alt text-purple"></i>
                                                            <strong
                                                                class="margin-10px-left xs-margin-four-left text-purple">Booking Status</strong>
                                                        </div>
                                                        <div class="col-md-7 col-7">
                                                            {{ $bookings->status }}
                                                        </div>
                                                    </div>

                                                </li>
                                                <br>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-5 col-5">
                                                            <i class="fas fa-envelope text-pink"></i>
                                                            <strong
                                                                class="margin-10px-left xs-margin-four-left text-pink">Created at:</strong>
                                                        </div>
                                                        <div class="col-md-7 col-7">
                                                            {{ $bookings->created_at }}
                                                        </div>
                                                    </div>
                                                </li>
                                                <br>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-5 col-5">
                                                            <i class="fas fa-envelope text-pink"></i>
                                                            <strong
                                                                class="margin-10px-left xs-margin-four-left text-pink">Updated at:</strong>
                                                        </div>
                                                        <div class="col-md-7 col-7">
                                                            {{ $bookings->updated_at }}
                                                        </div>
                                                    </div>
                                                </li>
                                                <br>
                                            </ul>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-md-12">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
