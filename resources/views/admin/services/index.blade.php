@extends('layouts.admin.app')

@section('content')
<div class="container-fluid pt-3">
    
        <!-- Navigation menu -->
        
        <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Services</h5>

                    <div class="float-right">
                        <a href="{{ route('services.create') }}" type="button" class="btn btn-primary"> New Services</a>
                    </div>
                    
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
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