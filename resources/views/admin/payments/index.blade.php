@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="width: 1230px;">
                    <div class="card-header">
                        <h5 class="mb-0"><b>Payments</b></h5>
                        <div class="float-right">
                            <a href="{{ route('payments.create') }}" type="button" class="btn btn-primary">New payments</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="form-group" style="width:fit-content;">
                                <input type="text" id="searchInput" class="form-control" placeholder="Search" />
                            </div>
                            <table class="table table-hover" style="text-align:center">
                                <thead>
                                    <tr>
                                        <th>Booking id</th>
                                        <th>Customer's Name</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($payments as $payment)
                                        <tr>
                                            <td>{{ $payment->booking_id }}</td>
                                            <td>{{ $payment->firstname }}</td>
                                            <td>{{ $payment->price }}</td>
                                            <td
                                                class="{{ $payment->status === 'unpaid' ? 'text-warning' : 'text-success' }}">
                                                {{ $payment->status }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('payments.edit', $payment) }}"
                                                        class="btn btn-primary">
                                                        <i class="fas fa-edit"></i>Edit
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" style="text-align: center;">No records found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
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
