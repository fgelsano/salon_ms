@extends('layouts.admin.app')

@section('content')
    <section class="content" style="margin-top: 50px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Total Employees</h3>
                            <h2>{{ \App\Models\Employee::count() }}</h2> <!-- Replace with actual total of employees -->
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i> <!-- Replace with your desired icon class -->
                        </div>
                        <a href="{{ url('/employees') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- Repeat the above code block for other statistics -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>Expected Revenue</h3>
                            <h2>&#8369;{{ number_format($annualIncome, 2) }}</h2> <!-- Replace with actual total sales -->
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i> <!-- Replace with your desired icon class -->
                        </div>
                        <a href="{{ url('/reports') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>Total Customers</h3>
                            <h2>{{ \App\Models\Customer::count() }}</h2> <!-- Replace with actual total customers -->
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i> <!-- Replace with your desired icon class -->
                        </div>
                        <a href="{{ url('/customers') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>Total Services</h3>
                            <h2>{{ \App\Models\Service::count() }}</h2><!-- Replace with actual total services -->
                        </div>
                        <div class="icon">
                            <i class="ion ion-wrench"></i> <!-- Replace with your desired icon class -->
                        </div>
                        <a href="{{ url('admin/services/') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> All Employees</h3>

                        <div class="card-tools">
                            <span class="badge badge-danger">
                                <?php
                                use App\Models\Employee as AppEmployee;
                                $employeeCount = AppEmployee::count();
                                echo 'Total Employees  :   ' . $employeeCount;
                                ?>
                            </span>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="users-list clearfix">
                            <?php
                            use App\Models\Employee;
                            $employees = Employee::all();
                            $employeeCounter = 0;
                            foreach ($employees as $employee) {
                                if ($employeeCounter === 5) {
                                    break; // Exit the loop after displaying 5 employees
                                }
                                $employeeCounter++;
                            ?>
                            <li>
                                <img src="{{ asset('uploads/' . $employee->picture) }}" alt="User Image">
                                <a class="users-list-name" href="#"><?php echo $employee->employee_name; ?></a>
                                <span class="users-list-date"
                                    style="color: {{ $employee->availability === 'Not Available' ? 'red' : 'green' }}">
                                    {{ $employee->availability }}</span>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('employees.index') }}">View All Employees</a>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
