<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Payment;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {


        $completedBookings = Payment::join('bookings', 'payments.booking_id', '=', 'bookings.id')
            ->join('customers', 'bookings.customer_id', '=', 'customers.id')
            ->join('services', 'bookings.service_id', '=', 'services.id')
            ->select('payments.*', 'bookings.id as booking_id', 'bookings.customer_id', 'customers.firstname', 'services.price')
            ->where('payments.status', 'Paid')
            ->paginate(10);


        $currentDate = Carbon::now()->toDateString();
        $dailyIncome = $completedBookings->filter(function ($payment) use ($currentDate) {
            return Carbon::parse($payment->created_at)->toDateString() === $currentDate;
        })->sum('price');

        $numberOfDaysInMonth = Carbon::now()->daysInMonth;
        $monthlyIncome = $dailyIncome * $numberOfDaysInMonth;

        $numberOfDaysInYear = Carbon::now()->isLeapYear() ? 366 : 365;
        $annualIncome = $dailyIncome * $numberOfDaysInYear;

        return view('admin.reports.index', compact(['completedBookings', 'dailyIncome', 'monthlyIncome', 'annualIncome']));
    }
}

