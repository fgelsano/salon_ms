
@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Navigation menu -->
        <div class="col-md-8">
        <table class="table">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Customers</h3>
            <div class="float-right">
                        <a href="{{ route('customers.create') }}" type="button" class="btn btn-primary">New Customer</a>
                    </div>
            
        </div>
                <tr>
                    <th>First Name</th>
                    <th>Lastname</th>
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
                        <div class="btn-group" role="group">
                                                <a href="{{ route('customers.edit', $customer) }}" class="btn btn-primary">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                               
                                                
                                                <!-- <form action="{{ route('customers.destroy', $customer) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this customer?')">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </button> -->

                                                    <form action="{{ route('customers.destroy', $customer) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        
                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                                    </form>
                        </td>
                    </tr>
                 @endforeach
                </table>

        </div>
    </div>
</div>

@endsection