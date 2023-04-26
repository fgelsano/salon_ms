<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;
// dire nako gi copy ang gkn sa booking kdto naay duha ka use sa ubos sa request


class CustomerController extends Controller
{
    public function index() {
        
        
        $customers = Customer::all();

        return view('admin.customers.index', compact('customers'));
    } 
    /**
     * Display existing record from database
     */
    public function edit(Request $request)
    {
        $customer = Customer::find($request->id);
        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update existing record to database
     */
    public function update(Request $request, $id)
{
    $customer = Customer::find($id);

    $customer->firstname = $request->firstname;
    $customer->lastname = $request->lastname;
    $customer->address = $request->address;
    $customer->contact = $request->contact;
    $customer->save();

    return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
}
    

    /**
     * Display empty form to add new record
     */
    public function create() {
        return view('admin.customers.add');
    }
    

    /**
     * Save new record to database
     */
    public function store(Request $request) 
{
    $validatedData = $request->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'address' => 'required',
        'contact' => 'required',
    ]);

    // create new instance of the model
    // save record
    $customer = Customer::create([
        'firstname' => $validatedData['firstname'],
        'lastname' => $validatedData['lastname'],
        'address' => $validatedData['address'],
        'contact' => $validatedData['contact']
    ]);

    if ($customer) {
        return redirect()->route('customers.index')->with('success', 'Customer created successfully!');
    } else {
        return back()->withInput()->with('error', 'Error creating customer.');
    }
}

    
    /**
     * Delete existing records from database
     */
   
public function destroy(Customer $customer)
{
    $customer->delete();
    return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
}

}
