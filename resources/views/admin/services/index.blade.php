@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Navigation menu -->
        <div class="col-md-8">
        <table class="table">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Services</h3>
            
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