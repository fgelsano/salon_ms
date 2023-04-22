@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Navigation menu -->
        
        <!-- <div class="col-md-8">
            <a href="{{ url('/bookings') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Bookings</a>
          
            <a href="{{ url('/customers') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Customers</a>
            <a href="{{ url('/services') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Services</a>
            <a href="{{ url('/settings') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Settings</a>
            <a href="{{ url('/reviews') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Reviews</a>
            <a href="{{ url('/payments') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Payments</a>
             -->
        
            <!-- End of Navigation menu -->
        
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

                     

                
                                
                            
                
    @endsection
