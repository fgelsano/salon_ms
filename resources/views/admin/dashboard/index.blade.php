@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Navigation menu -->
        <div class="col-md-8">
            <a href="{{ url('/bookings') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Bookings</a>
<<<<<<< HEAD
        </div>
        <!-- End of Navigation menu -->
             
<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-primary mb-3">
    <div class="flex-row d-flex">
        <button type="button" class="navbar-toggler mr-2 " data-toggle="offcanvas" title="Toggle responsive left sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#" title="Free Bootstrap 4 Admin Template">Salon Booking System</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse " id="collapsingNavbar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
   

</nav>
<div class="container-fluid" id="main">
    <div class="row row-offcanvas row-offcanvas-left">
        <div class="col-md-3 col-lg-2 sidebar-offcanvas bg-light pl-0" id="sidebar" role="navigation">
            <ul class="nav flex-column sticky-top pl-0 pt-5 mt-3">
                <li class="nav-item"><a class="nav-link" href="#">Bookings</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="#submenu1" data-toggle="collapse" data-target="#submenu1">Customers</a>
                    <ul class="list-unstyled flex-column pl-3 collapse" id="submenu1" aria-expanded="false">
                       <li class="nav-item"><a class="nav-link" href="">Services</a></li>
                      
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="home.blade.php">Reviews</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Payments</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Review responses</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Booking Details</a></li>
            </ul>
         </div>
     </div>
     
                </div>
              @include('layouts.tables.dashboardtable')
            </div>
=======
            <!-- mao ni ang sa customerna makita sa dashboard -->
            <a href="{{ url('/customers') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Customers</a>
            <a href="{{ url('/services') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Services</a>
            <a href="{{ url('/settings') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Settings</a>
            <a href="{{ url('/reviews') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Reviews</a>
            <a href="{{ url('/payments') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Payments</a>
            
        
            <!-- End of Navigation menu -->
>>>>>>> master

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} Testing</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
