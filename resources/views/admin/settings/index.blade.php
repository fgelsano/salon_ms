@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Navigation menu -->
        <div class="col-md-8">
        <table class="table">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Settings</h3>
                <tr>
                    <th>Key</th>
                    <th>Value</th>
                    <th>Action</th>
                   
                </tr>
                @foreach($settings as $setting)
                    <tr>
                        <td>{{ $setting->key }}</td>
                        <td>{{ $setting->value }}</td>
                        
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