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
        $customer = customer::find($request->id);
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

    

    $customer->customer_id = $request->booking_id;
    $customer->reservation_date = $request->reservation_date;
    $customer->reservation_time = $request->reservation_time;
    $customer->status = $request->status;
    $customer->save();

    return redirect()->route('customer.index')->with('success', 'Customer updated successfully!');
    }

    public function create()
    {
        $bookings = Bookings::all();
        return view('admin.customer.create', compact('bookings'));
    }

    /**
     * Save new record to database
     */
    public function store(Request $request) 
    {
        // create new instance of the model
        // save record
        $customer = Customer::create([
            'booking_id' => $request->input('booking_id'),
            'reservation_date' => $request->input('reservation_date'),
            'reservation_time' => $request->input('reservation_time'),
            'status' => $request->input('status')
        ]);

        if ($customer) {
            return redirect()->route('customer.index')->with('success', 'Customer created successfully!');
        } else {
            return back()->withInput()->with('error', 'Error creating booking.');
        }

    }

    /**
     * Delete existing records from database
     */
    public function delate($id)
     {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer has been deleted successfully');
        
    }


}
