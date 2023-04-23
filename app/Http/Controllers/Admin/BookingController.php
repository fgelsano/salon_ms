<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Customer;

class BookingController extends Controller
{
    /**
     * Display listings of all records from database
     */
    public function index()
    {

        $bookings = Booking::all();
        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Display existing record from database
     */
    public function edit(Request $request)
    {
        $booking = Booking::find($request->id);
        $customers = Customer::all();
        return view('admin.bookings.edit', compact(['booking','customers']));
    }

    /**
     * Update existing record to database
     */
    

public function update(Request $request, $id)
{
    // $request->validate([
    //     'customer_id' => 'required|exists:customers,id',
    //     'reservation_date' => 'required|date',
    //     'reservation_time' => 'required',
    //     'status' => 'required|in:pending,confirmed,canceled',
    // ]);

    $booking = Booking::find($id);

    $booking->customer_id = $request->customer_id;
    $booking->reservation_date = $request->reservation_date;
    $booking->reservation_time = $request->reservation_time;
    $booking->status = $request->status;
    $booking->save();

    return redirect()->route('bookings.index')->with('success', 'Booking updated successfully!');
}

    /**
     * Display empty form to add new record
     */
    public function create()
    {
        $customers = Customer::all();
        return view('admin.bookings.create', compact('customers'));
    }

    /**
     * Save new record to database
     */
    public function store(Request $request)
    {
        // create new instance of the model
        // save record
            $booking = Booking::create([
            'customer_id' => $request->input('customer_id'),
            'reservation_date' => $request->input('reservation_date'),
            'reservation_time' => $request->input('reservation_time'),
            'status' => $request->input('status')
        ]);
    
        if ($booking) {
            return redirect()->route('bookings.index')->with('success', 'Booking created successfully!');
        } else {
            return back()->withInput()->with('error', 'Error creating booking.');
        }
    }


    /**
     * Delete existing records from database
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking has been deleted successfully');
        
}
    }

    
    


    
