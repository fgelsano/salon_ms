@extends('layouts.admin.app')

@section('content')
<div class="container-fluid pt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Employees</h5>

                    <div class="float-right">
                        <a href="{{ route('employees.create') }}" type="button" class="btn btn-primary">New Employees</a>
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
                                    <th>Employees Name</th>
                                    <th>Employees Services</th>
                                    <th>Rule</th>
                                    <th>Availability</th>
                                    <th>Profile Picture</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($employees as $employee)
                                <tr>

                                    <td>{{ $employee->employee_name}}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->rule }}</td>
                                    <td style="color:{{$employee->available === 'on duty' ? 'red' : 'green'}}">{{ $employee->available }}</< /td>
                                    <td><img src="{{ asset('uploads/'.$employee->picture) }}" width="100"></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>


                                            <form action="{{ route('employees.destroy', $employee) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Employee?')">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>

                                            </form>
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