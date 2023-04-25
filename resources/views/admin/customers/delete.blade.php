

<form method="POST" action="{{ route('customers.destroy', $customer->id) }}">
    @csrf
    @method('DELETE')
    
    <p>Are you sure you want to delete this customer?</p>
    
    <button type="submit">Delete</button>
</form>
