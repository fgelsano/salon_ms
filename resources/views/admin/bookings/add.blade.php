@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('bookings.store') }}">
    @csrf

    <label for="name">Name:</label>
    <input type="text" name="name" id="name">

    <label for="email">Email:</label>
    <input type="email" name="email" id="email">

    <label for="start_time">Start time:</label>
    <input type="datetime-local" name="start_time" id="start_time">

    <label for="end_time">End time:</label>
    <input type="datetime-local" name="end_time" id="end_time">

    <button type="submit">Create Booking</button>
</form>