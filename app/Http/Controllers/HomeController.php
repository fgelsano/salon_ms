<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Payment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $completedBookings = Payment::join('bookings', 'payments.booking_id', '=', 'bookings.id')
            ->join('customers', 'bookings.customer_id', '=', 'customers.id')
            ->join('services', 'bookings.service_id', '=', 'services.id')
            ->select('payments.*', 'bookings.id as booking_id', 'bookings.customer_id', 'customers.firstname', 'services.price')
            ->where('payments.status', 'Paid')
            ->get();
        $currentYear = Carbon::now()->format('Y');
        $annualIncome = $completedBookings->filter(function ($payment) use ($currentYear) {
            return Carbon::parse($payment->created_at)->format('Y') === $currentYear;
        })->sum('price');
        return view('admin.dashboard.index', compact('annualIncome'));
    }
}
