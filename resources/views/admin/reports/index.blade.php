@extends('layouts.admin.app')

@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>Daily Revenue </h3>
                        <h2>&#8369;{{ number_format($dailyIncome, 2) }}</h2>
                    </div>
                    <div class="icon">
                        <i class="ion ion-cash"></i>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>Monthly Revenue</h3>
                        <h2>&#8369;{{ number_format($monthlyIncome, 2) }}</h2>
                    </div>
                    <div class="icon">
                        <i class="ion ion-cash"></i> <!-- Replace with your desired icon class -->
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-warning">
                    <div class="inner">
                        <h3>Annual Revenue:</h3>
                        <h2>&#8369;{{ number_format($annualIncome, 2) }}</h2>
                    </div>
                    <div class="icon">
                        <i class="ion ion-cash"></i> <!-- Replace with your desired icon class -->
                    </div>

                </div>
            </div>
            <div class="container-fluid pt-3">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card" style="width: 1230px;">
                            <div class="card-header">
                                <h5 class="mb-0"><b>Reports</b></h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="form-group" style="width:fit-content; text-align:right;">
                                        <input type="text" id="searchInput" class="form-control" placeholder="Search" />
                                    </div>
                                    <table class="table table-hover" style="text-align:center;">
                                        <thead>
                                            <tr>
                                                <th>Booking id</th>
                                                <th>Customer's Name</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $totalPrice = $completedBookings->sum('price');
                                        @endphp
                                        <tbody>
                                            @forelse ($completedBookings as $payment)
                                                <tr>
                                                    <td>{{ $payment->booking_id }}</td>
                                                    <td>{{ $payment->firstname }}</td>
                                                    <td>{{ $payment->price }}</td>
                                                    <td
                                                        class="{{ $payment->status === 'unpaid' ? 'text-warning' : 'text-success' }}">
                                                        {{ $payment->status }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" style="text-align: center;">No records found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="0"></td>
                                                <td><b> Total Price:</b></td>
                                                <td><b>{{ $totalPrice }}</b></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <button class="btn btn-primary" onclick="window.print()">
                                    <i class="fas fa-print"></i> Print
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#searchInput').keyup(function() {
                        var searchText = $(this).val().toLowerCase();
                        $('table tr').each(function() {
                            var rowText = $(this).text().toLowerCase();
                            if (rowText.indexOf(searchText) === -1) {
                                $(this).hide();
                            } else {
                                $(this).show();
                            }
                        });
                    });
                });
            </script>
        @endsection
