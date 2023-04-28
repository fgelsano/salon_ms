<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Booking;


// dire nako gi copy ang gkn sa cu$customer kdto naay duha ka use sa ubos sa request


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
        $bookings = Booking::all();
        return view('admin.customers.edit', compact(['customer','bookings']));
    }

    /**
     * Update existing record to database
     */
    public function update(Request $request,$id) 
    {
        // get id of the requested to update
        // save request
    

    /**
     * Display empty form to add new record
     */
    
     $customer = Customer::find($id);

    

    $customer->firstname = $request->firstname;
    $customer->lastname = $request->lastname;
    $customer->address = $request->address;
    $customer->contact = $request->contact;
    $customer->save();

    return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    public function create()
    {
        $customers = Customer::all();
        return view('admin.customers.add', compact('customers'));
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
            'firstname' =>  $request->input('firstname'),
            'lastname' =>  $request->input('lastname'),
            'address' =>  $request->input('address'),
            'contact' =>  $request->input('contact'),

            // 'booking_id' => $request->input('booking_id'),
            // 'reservation_date' => $request->input('reservation_date'),
            // 'reservation_time' => $request->input('reservation_time'),
            // 'status' => $request->input('status')
        ]);

        if ($customer) {
            return redirect()->route('customers.index')->with('success', 'Customer created successfully!');
        } else {
            return back()->withInput()->with('error', 'Error creating booking.');
        }

    }

    /**
     * Delete existing records from database
     */
    
    public function destroy($id)
    {
       $customers = Customer::find($id);
       $customers->delete();
       return redirect()->route('customers.index')->with('success', 'Customer has been deleted successfully');
       
   }




}
