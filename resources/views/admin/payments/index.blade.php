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
                        <td>{{ $payment->status }}</td>
                        <td>{{ $payment->action}}</td>
                       
                        <td>
                        <td>
                        <div class="btn-group" role="group">
                                                <a href="{{ route('payments.edit', $payment) }}" class="btn btn-primary">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                               
                                                
                                            
                                                    <form action="{{ route('payments.destroy', $payment) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        
                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                                    </form>
                        </td>
                        </td>
                    </tr>
                 @endforeach
                </table>

        </div>
    </div>
</div>

@endsection