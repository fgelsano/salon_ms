@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Navigation menu -->
        <div class="col-md-8">
        <table class="table">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Customers</h3>
            
        </div>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->firstname }}</td>
                        <td>{{ $customer->lastname }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->contact }}</td>
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