@extends('layouts.admin.app')

@section('content')
<div class="container-fluid pt-3">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Reports Sales</h5>
                    <div class="float-right">


                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="form-group" style="width:fit-content;">
                            <input type="text" id="searchInput" class="form-control" placeholder="Search" />
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Customer's Firtsname </th>
                                    <th>Customer's Lastname </th>
                                    <th>Contac Number </th>
                                    <th>Payment Status </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($customers as $customer)
                                <tr>
                                <tr>
                                    <td>{{ $customer->firstname }}</td>
                                    <td>{{ $customer->lastname }}</td>
                                    <td>{{ $customer->contact }}</td>
                                    <td>{{ $customer->status }}</td>
                                    <td>

                                        <div class="btn-group" role="group">
                                            <a href="" class="btn btn-primary">
                                                <i class="fas fa-edit"></i> View
                                            </a>

                                            <a href="javascript:void(0)" onclick="window.print()" class="btn btn-secondary">
                                                <i class="fas fa-print"></i> Print
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