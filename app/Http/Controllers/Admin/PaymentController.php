<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Booking;

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
            ->select('payments.*', 'bookings.id', 'bookings.customer_id', 'customers.firstname')
            // ->paginate(10);
            ->get();


        return view('admin.payments.index', compact('payments'));
    }

    public function destroy(Request $request, $id)
    {
        $payments = Payment::find($id);
        $payments->delete();
        return redirect()->route('payments.index')->with('success', 'payment has been deleted successfully');
    }
    public function edit(Request $request, $id)
    {
        $payment = Payment::find($request->id);
        $bookings = Booking::all();
        return view('admin.payments.edit', compact(['payment', 'bookings']));
    }

    public function update(Request $request, $id)
    {

        $payment = Payment::find($id);

        $payment->booking_id = $request->booking_id;
        $payment->amount = $request->amount;
        $payment->status = $request->status;
        $payment->save();

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully!');
    }

    public function create()
    {
        $bookings = Booking::all();
        $payments = Payment::all();
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
}
