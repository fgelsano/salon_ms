@extends('layouts.admin.app')

@section('content')
<div class="container-fluid pt-3">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Payments</h5>

                    <div class="float-right">
                        <a href="{{ route('payments.create') }}" type="button" class="btn btn-primary">New payments</a>
                    </div>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">

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
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('payments.edit', $payment) }}" class="btn btn-primary">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        <!-- <form action="{{ route('payments.destroy', $payment) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this booking?')">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </button>
                                                    </form> -->
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection