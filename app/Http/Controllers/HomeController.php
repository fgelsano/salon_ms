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
        $currentDate = Carbon::now()->toDateString();
        $dailyIncome = $completedBookings->filter(function ($payment) use ($currentDate) {
            return Carbon::parse($payment->created_at)->toDateString() === $currentDate;
        })->sum('price');
        $numberOfDaysInYear = Carbon::now()->isLeapYear() ? 366 : 365;
        $annualIncome = $dailyIncome * $numberOfDaysInYear;
        return view('admin.dashboard.index', compact('annualIncome'));
    }
    public function profile(){
        return view('admin.profile');
    }
}
