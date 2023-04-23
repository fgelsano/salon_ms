form method="POST" action="{{ route('customers.delete') }}">
    @csrf
    
    <label for="client_id">Client:</label>
    <select name="client_id" id="client_id">
        @foreach ($clients as $client)
            <option value="{{ $client->id }}">{{ $client->name }}</option>
        @endforeach
    </select>
    
    <label for="firstname">Name:</label>
    <input type="text" name="name" id="firstname">
    
    <label for="lastname">Lastname:</label>
    <input type="text" name="lastname" id="lastname">

    <label for="address">Address:</label>
    <input type="text" name="address" id="address">

    <label for="contact">Contact:</label>
    <input type="number" name="contact" id="contact">
    
    <button type="submit">Book</button>
</form>