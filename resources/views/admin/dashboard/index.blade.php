@extends('layouts.admin.app')

@section('content')
    <section class="content" style="margin-top: 50px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Total Employees</h3>
                            <p>{{ \App\Models\Employee::count() }}</p> <!-- Replace with actual total of employees -->
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i> <!-- Replace with your desired icon class -->
                        </div>
                        <a href="{{ url('/employees') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- Repeat the above code block for other statistics -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>Total Sales</h3>
                            <p>1000</p> <!-- Replace with actual total sales -->
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i> <!-- Replace with your desired icon class -->
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>Total Customers</h3>
                            <p>{{ \App\Models\Customer::count() }}</p> <!-- Replace with actual total customers -->
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i> <!-- Replace with your desired icon class -->
                        </div>
                        <a href="{{ url('/customers') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>Total Services</h3>
                            <p>{{ \App\Models\Service::count() }}</p><!-- Replace with actual total services -->
                        </div>
                        <div class="icon">
                            <i class="ion ion-wrench"></i> <!-- Replace with your desired icon class -->
                        </div>
                        <a href="{{ url('admin/services/') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
