<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Usersbooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;


class BookingController extends Controller
{
    /**
     * Display listings of all records from database
     */

    public function index()
    {
        $bookings = Booking::select('bookings.*', 'employees.employee_name', 'customers.firstname', 'services.name', 'services.category')
            ->join('employees', 'bookings.employee_id', '=', 'employees.id')
            ->join('customers', 'bookings.customer_id', '=', 'customers.id')
            // ->join('users', 'bookings.user_id', '=', 'users.id')
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
        $customer = Customer::all();
        $employees = Employee::all();
        $services = Service::all();

        return view('admin.bookings.edit', compact(['booking', 'customer', 'employees', 'services']));
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
            'category_id' => $request->input('category_id'),
            'service_id' => $request->input('service_id'),
            'reservation_date' => $request->input('reservation_date'),
            'reservation_time' => $request->input('reservation_time'),
            'status' => $request->input('status')
        ]);

        if ($booking) {
            return redirect()->route('bookings.index')->with('success', 'Booked successfully!');
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
        $bookings = Booking::select('bookings.*', 'employees.employee_name', 'customers.firstname', 'services.name', 'services.category')
            ->join('employees', 'bookings.employee_id', '=', 'employees.id')
            ->join('customers', 'bookings.customer_id', '=', 'customers.id')
            ->join('services', 'bookings.service_id', '=', 'services.id')
            ->where('bookings.id', $id)
            ->first();

        return view('admin.bookings.booking_details', compact('bookings'));
    }
    public function addbooking(Request $request)
    {
        $booking = Booking::find($request->id);
        $user = User::all();
        $employees = Employee::all();
        $services = Service::all();
        return view('frontend.booking', compact(['booking', 'user', 'employees', 'services']));
    }

    /**
     * Save new record to database
     */


    public function storebooking(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'address' => 'required|string',
            'contact' => 'required|string',
            'employee_id' => 'required|exists:employees,id',
            'category_id' => 'required|exists:services,id',
            'service_id' => 'required|exists:services,id',
            'reservation_date' => 'required|date',
            'reservation_time' => 'required',
        ]);

        // Create a new customer record
        $customer = Customer::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'address' => $validatedData['address'],
            'contact' => $validatedData['contact'],
        ]);

        // Generate a customer ID
        $customerID = $customer->id;

        // Create a new booking record with the customer ID
        $booking = Booking::create([
            'customer_id' => $customerID,
            'employee_id' => $validatedData['employee_id'],
            'category_id' => $validatedData['category_id'],
            'service_id' => $validatedData['service_id'],
            'reservation_date' => $validatedData['reservation_date'],
            'reservation_time' => $validatedData['reservation_time'],
        ]);

        // Get the phone number associated with the booking
        $phoneNumber = $validatedData['contact'];

        // Prepare the message to be sent
        $message = 'Your booking with JCJ Salon ID has been successfully created. This is your booking reference: '. $booking->id .' Keep it for your uses! THANK YOU!!!!<3' ;

        // Send the SMS using the SMS API
        $client = new Client();
        $response = $client->request('POST', 'https://semaphore.co/api/v4/messages', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . env('SEM_API_KEY'),
            ],
            'json' => [
                'number' => $phoneNumber,
                'apikey' => env('SEM_API_KEY'),
                'from' => config('app.semaphore_from'),
                'message' => $message,
            ],
        ]);

        // Check the response and handle any errors
        $statusCode = $response->getStatusCode();
        $responseData = json_decode($response->getBody(), true);

        if ($statusCode === 200 && isset($responseData['result']) && $responseData['result'] === 'success') {
            return redirect()->route('reviews.addreviews')->with('success', 'Customer created successfully! SMS sent.');
        } elseif (isset($responseData['error'])) {
            return redirect()->route('reviews.addreviews')->with('success', 'Customer created successfully! Error sending SMS: ' . $responseData['error']);
        } else {
            return redirect()->route('reviews.addreviews')->with('success', 'Customer created successfully! SMS sent.');
        }
    }

    public function getBookingData(Request $request)
    {
        $bookingId = $request->input('booking_id');

        // Retrieve the booking data from the database based on the booking ID
        $booking = Booking::find($bookingId);

        if ($booking) {
            // Pass the booking data to a view or return it as JSON response
            return view('frontend.status', compact('booking'));
        } else {
            return redirect()->route('frontend.status')->with('error', 'Booking ID not found!');
        }
    }
}
