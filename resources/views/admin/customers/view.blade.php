<form method="POST" action="{{ route('customers.store') }}">
    @csrf
    
    <label for="customer_id">Customer:</label>
    <select name="customer_id" id="customer_id">
        @foreach ($customers as $customer)
             <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            <h2>{{ $customer->firstname }}</h2>
            <p>{{ $customer->lastname }}</p>  
            <p>{{ $customer->address }}</p> 
            <p>{{ $customer->contact }}</p>  
        @endforeach
       
    </select>
    
    <label for="customer">Customer Name:</label>
    <input type="name" name="customer_name" id="firstname">
    
    <label for="lastname">Lastname:</label>
    <input type="name" name="lastname" id="lastname">

    <label for="category">Category:</label>
    <input type="name" name="category" id="category">

    <label for="contact">Contact:</label>
    <input type="name" name="contact" id="contact">
    
    <button type="submit">Book</button>
</form>

