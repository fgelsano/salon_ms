@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Navigation menu -->
        <div class="col-md-8">
        <table class="table">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Services</h3>
            <div class="float-right">
                        <a href="{{ route('services.create') }}" type="button" class="btn btn-primary">New Services</a>
                    </div>
            
        </div>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Action</th>
                    
                </tr>
                @foreach($services as $service)
                    <tr>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->description }}</td>
                        <td>{{ $service->category }}</td>
                        
                        <td>
                        <div class="btn-group" role="group">
                                                <a href="{{ route('services.edit', $service) }}" class="btn btn-primary">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                               
                                                
                                                <form action="{{ route('services.destroy', $service) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this booking?')">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </button>
                        </td>
                    </tr>
                 @endforeach
                </table>

        </div>
    </div>
</div>

@endsection