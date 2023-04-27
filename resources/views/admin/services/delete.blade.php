

form method="POST" action="{{ route('services.delete') }}">
    @csrf
    @method('DELETE')
    
    <p>Are you sure you want to delete this service?</p>
    <input type="hidden" name="id" value="{{ $service->id }}">
    
    <button type="submit">Delete</button>
</form>

    
    <label for="name">Name:</label>
    <input type="text" name="name" id="name">
    
    <label for="description">Description:</label>
    <input type="text" name="description" id="description">
    
    <label for="category">Booking Time:</label>
    <input type="text" name="category" id="category">
    
    <button type="submit">Service</button>
</form>
