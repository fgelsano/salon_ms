<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Service;

class BookingController extends Controller
{
    /**
     * Display listings of all records from database
     */
    
    public function index()
    {
        $bookings = Booking::select('bookings.*', 'employees.employee_name', 'customers.firstname', 'services.name')
        ->join('employees', 'bookings.employee_id', '=', 'employees.id')
        ->join('customers', 'bookings.customer_id', '=', 'customers.id')
        ->join('services', 'bookings.service_id', '=', 'services.id')
        ->get();

    return view('admin.bookings.index', compact('bookings'));
    }


    /**
     * Display existing record from database
     */
    public function edit(Request $request)
    {
        $booking = Booking::find($request->id);
        $customers = Customer::all();
        $employees = Employee::all();
        $services = Service::all();

        return view('admin.bookings.edit', compact(['booking', 'customers', 'employees', 'services']));
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
        $booking->employee_id = $request->employee_id;
        $booking->service_id = $request->service_id;
        $booking->reservation_date = $request->reservation_date;
        $booking->reservation_time = $request->reservation_time;
        $booking->status = $request->status;
        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully!');
    }

    /**
     * Display empty form to add new record
     */
    public function create(Request $request)
    {
        $booking = Booking::find($request->id);
        $customers = Customer::all();
        $employees = Employee::all();
        $services = Service::all();

        

        return view('admin.bookings.create', compact(['booking', 'customers', 'employees', 'services']));
    }

    /**
     * Save new record to database
     */
    public function store(Request $request)
    {
        $booking = Booking::create([
            'customer_id' => $request->input('customer_id'),
            'employee_id' => $request->input('employee_id'),
            'service_id' => $request->input('service_id'),
            'reservation_date' => $request->input('reservation_date'),
            'reservation_time' => $request->input('reservation_time'),
            'status' => $request->input('status')
        ]);

        if ($booking) {
            return redirect()->route('bookings.index')->with('success', 'Customer created successfully!');
        } else {
            return back()->withInput()->with('error', 'Error creating booking.');
        }
    }


    /**
     * Delete existing records from database
     */
    public function destroy($id)
    {
        
    }

    public function booking_details(Request $request, $id)
    {
        // $request->validate([
        //     'customer_id' => 'required|exists:customers,id',
        //     'reservation_date' => 'required|date',
        //     'reservation_time' => 'required',
        //     'status' => 'required|in:pending,confirmed,canceled',
        // ]);

        $bookings = Booking::find($id);

   

        return view('admin.bookings.booking_details', compact('bookings'));
    }

    
}
