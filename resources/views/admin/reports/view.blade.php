@extends('layouts.admin.app')

@section('content')
<<<<<<< HEAD
<div class="container-fluid pt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">{{ __('Reports') }} #{{ $customers->id }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">


                            <div class="form-group">
                                <label for="booking_id">Customer Firstname:</label>
                                <p class="form-control-static">{{ $customers->firstname }}</p>
                            </div>
                            <div class="form-group">
                                <label for="customer_name">Customer Lastname:</label>
                                <p class="form-control-static">{{ $customers->lastname }}</p>
                            </div>
                            <div class="form-group">
                                <label for="employee_name">Contact Number:</label>
                                <p class="form-control-static">{{ $customers->contact }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="service_name">Payment Status:</label>
                                <p class="form-control-static">{{ $customers->address }}</p>
                            </div>
                        </div>

               


                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="btn-group" role="group" style="width: 200px; background-color: #f2f2f2; padding: 10px;">
        <a href="javascript:void(0)" onclick="window.print()" class="btn btn-secondary">
            <i class="fas fa-print"></i> Print
        </a>
    </div>

   
    @endsection
=======
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">{{ __('Reports') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">


                                <div class="form-group">
                                    <label for="booking_id">Customer Firstname:</label>
                                    <p class="form-control-static">{{ $customers->firstname }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="customer_name">Customer Lastname:</label>
                                    <p class="form-control-static">{{ $customers->lastname }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="employee_name">Contact Number:</label>
                                    <p class="form-control-static">{{ $customers->contact }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="service_name">Payment Status:</label>
                                    <p class="form-control-static">{{ $customers->address }}</p>
                                </div>
                            </div>




                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="btn-group" role="group" style="width: 200px; background-color: #f2f2f2; padding: 10px;">
            <a href="javascript:void(0)" onclick="window.print()" class="btn btn-secondary">
                <i class="fas fa-print"></i> Print
            </a>
        </div>
    @endsection
>>>>>>> ed001b03044fecc23812137748d1901b18522e21
