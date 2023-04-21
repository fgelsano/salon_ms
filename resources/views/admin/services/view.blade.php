<form method="POST" action="{{ route('services.store') }}">
    @csrf
    
    <label for="servcice_id">Service:</label>
    <select name="service_id" id="service_id">
        @foreach ($services as $service)
             <option value="{{ $service->id }}">{{ $service->name }}</option>
            <h2>{{ $service->name }}</h2>
            <p>{{ $service->description }}</p>  
            <p>{{ $service->category }}</p>  
        @endforeach
        @endforeach
    </select>
    
    <label for="service">Service Name:</label>
    <input type="name" name="service_name" id="name">
    
    <label for="description">Description:</label>
    <input type="name" name="description" id="description">

    <label for="category">Category:</label>
    <input type="name" name="category" id="category">
    
    <button type="submit">Book</button>
</form>

