<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;


class PaymentController extends Controller
{
    //
    public function index()
    {
        $bookings = Booking::select('bookings.*', 'employees.employee_name', 'customers.firstname', 'services.price','services.name', 'services.category')
            ->join('employees', 'bookings.employee_id', '=', 'employees.id')
            ->join('customers', 'bookings.customer_id', '=', 'customers.id')
            ->join('services', 'bookings.service_id', '=', 'services.id')
            ->leftJoin('payments', 'bookings.id', '=', 'payments.booking_id')
            ->where('bookings.status', 'Confirmed')
            ->orWhere('bookings.status', 'Completed')
            ->paginate(10);

        return view('admin.payments.index', compact('bookings'));
    }
    public function indexhistory()
    {
        $completedBookings = Payment::join('bookings', 'payments.booking_id', '=', 'bookings.id')
            ->join('customers', 'bookings.customer_id', '=', 'customers.id')
            ->join('services', 'bookings.service_id', '=', 'services.id')
            ->select('payments.*', 'bookings.id as booking_id', 'bookings.customer_id', 'customers.firstname', 'services.price', 'services.name')
            ->where('payments.status', 'Paid')
            ->paginate(10);

        return view('admin.payments.indexhistory', compact('completedBookings'));
    }

    public function destroy(Request $request, $id)
    {
        $payments = Payment::find($id);
        $payments->delete();
        return redirect()->route('payments.index')->with('success', 'payment has been deleted successfully');
    }
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.payments.edit', compact(['id']));
    }

    public function update(Request $request, $id)
    {
        // dd($request->status, $id);

        $payment = Payment::where('booking_id', $id)->first();
        // dd($payment);
        if ($payment == null) {
            $payment = new Payment();
        }
        $payment->booking_id = $id;

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
