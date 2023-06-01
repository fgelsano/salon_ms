<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Customer;


class PaymentController extends Controller
{
    //
    public function index()
    {

        // $payments = Payment::select('payments.*', 'bookings.id')
        //     ->join('bookings', 'payments.booking_id', '=', 'bookings.id')
        //     ->get();

        $payments = Payment::join('bookings', 'payments.booking_id', '=', 'bookings.id')
            ->join('customers', 'bookings.customer_id', '=', 'customers.id')
            ->join('services', 'payments.amount', '=', 'services.id')
            ->select('payments.*', 'bookings.id as booking_id', 'bookings.customer_id', 'customers.firstname', 'services.price')
            ->get();


        return view('admin.payments.index', compact('payments'));
    }

    public function destroy(Request $request, $id)
    {
        $payments = Payment::find($id);
        $payments->delete();
        return redirect()->route('payments.index')->with('success', 'payment has been deleted successfully');
    }
    public function edit(Request $request)
    {
        $payment = Payment::find($request->id);
        return view('admin.payments.edit', compact(['payment']));
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::find($id);
        $payment->status = $request->status;
        $payment->save();

        if ($payment->status === 'paid') {
            // Find the booking associated with the payment
            $booking = Booking::find($payment->booking_id);
            if ($booking) {
                // Update the booking status to "completed"
                $booking->status = 'Completed';
                $booking->save();
            }
        }

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully!');
    }

    public function create(Request $request)
    {
        $payment = Payment::find($request->id);
        $bookings = Booking::all();
        $payments = Payment::all();
        $services = Service::all();
        $customers = Customer::all();

        return view('admin.payments.add', compact(['payments', 'bookings']));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'booking_id' => 'required',
            'amount' => 'required',
            'status' => 'required',
        ]);

        $payments = Payment::create([
            'booking_id' => $request->input('booking_id'),
            'amount' => $request->input('amount'),
            'status' => $request->input('status')
        ]);

        if ($payments) {
            return redirect()->route('payments.index')->with('success', 'Payments created successfully!');
        } else {
            return back()->withInput()->with('error', 'Error creating payments.');
        }
    }
    public function show($paymentId)
    {
        $payment = Payment::find($paymentId);
        $booking = $payment->booking;

        // Perform any necessary operations with the $booking object
        // Return a response or pass the $booking object to a view

        // Example: Pass the $booking object to a view
        return view('payment.show', compact('booking'));
    }
}
