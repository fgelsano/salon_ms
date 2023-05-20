@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('NAKASUD') }} NAKA UY </div>

                <div class="card-body">
                    <h5 class="card-title text-white"><i class="fas fa-chart-line"></i> Total Sales This Month</h5>
                    <p class="card-text text-white">$100</p>
                    <a href="#" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card bg-success">
                <div class="card-body">
                    <h5 class="card-title text-white"><i class="fas fa-chart-line"></i> Total Sales Last Month</h5>
                    <p class="card-text text-white">$100</p>
                    <a href="#" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
