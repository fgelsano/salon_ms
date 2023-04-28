
form method="POST" action="{{ route('customers.delete') }}">
    @csrf
    @method('DELETE')
    
    <p>Are you sure you want to delete this service?</p>
    <input type="hidden" name="id" value="{{ $customer->id }}">
    
    <button type="submit">Delete</button>
</form>

    
    <label for="firstname">First Name:</label>
    <input type="text" name="firstname" id="firstname">
    
    <label for="lastname">Lastname:</label>
    <input type="text" name="lastname" id="lastname">
    
    <label for="address">Address:</label>
    <input type="text" name="address" id="address">

    <label for="contact">Address:</label>
    <input type="number" name="contact" id="contact">
    
    <button type="submit">Customer</button>
</form>

<form method="POST" action="{{ route('customers.destroy', $customer->id) }}">
    @csrf
    @method('DELETE')
    
    <p>Are you sure you want to delete this customer?</p>
    
    <button type="submit">Delete</button>
</form>
