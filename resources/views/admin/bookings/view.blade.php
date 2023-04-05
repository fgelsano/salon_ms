<form method="POST" action="{{ route('bookings.store') }}">
    @csrf
    
    <label for="client_id">Client:</label>
    <select name="client_id" id="client_id">
        @foreach ($clients as $client)
            <option value="{{ $client->id }}">{{ $client->name }}</option>
        @endforeach
    </select>
    
    <label for="booking_date">Booking Date:</label>
    <input type="date" name="booking_date" id="booking_date">
    
    <label for="booking_time">Booking Time:</label>
    <input type="time" name="booking_time" id="booking_time">
    
    <button type="submit">Book</button>
</form>