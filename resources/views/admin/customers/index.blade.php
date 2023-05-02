@extends('layouts.admin.app')

@section('content')
<div class="container-fluid pt-3">

    <!-- Navigation menu -->

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Customers</h5>

                    <div class="float-right">
                        <a href="{{ route('customers.create') }}" type="button" class="btn btn-primary">New Customers</a>
                    </div>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
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
        </div>
    </div>
</div>

@endsection