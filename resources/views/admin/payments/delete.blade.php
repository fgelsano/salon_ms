
form method="POST" action="{{ route('payments.delete') }}">
    @csrf
    @method('DELETE')
    
    <p>Are you sure you want to delete this payment?</p>
    <input type="hidden" name="id" value="{{ $payment->id }}">
    
    <button type="submit">Delete</button>
</form>

    
    <label for="firstname">Amount:</label>
    <input type="number" name="amount" id="amount">
    
    <label for="status">Status:</label>
    <input type="text" name="status" id="status">
    
    
    <button type="submit">Payment</button>
</form>

<form method="POST" action="{{ route('payments.destroy', $payment->id) }}">
    @csrf
    @method('DELETE')
    
    <p>Are you sure you want to delete this payment?</p>
    
    <button type="submit">Delete</button>
</form>
