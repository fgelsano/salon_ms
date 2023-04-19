@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Navigation menu -->
        <div class="col-md-8">
        <table class="table">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Payments</h3>

                <tr>
                    <th>Booking id</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                </tr>
                @foreach($payments as $payment)
                    <tr>
                        <td>{{ $payment->booking_id }}</td>
                        <td>{{ $payment->amount}}</td>
                        <td>{{ $payment->reservation_time }}</td>
                        <td>{{ $payment->status}}</td>
                       
                        <td>
                            <a href='#'>View</a> |
                            <a href='#'>Edit</a> |
                            <a href='#'>Delete</a>
                        </td>
                    </tr>
                 @endforeach
                </table>

        </div>
    </div>
</div>

@endsection