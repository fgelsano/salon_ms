<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class FrontendController extends Controller
{
    public function home()
    {

        return view('frontend.welcome');
    }
    public function status()
    {
        $bookings = Booking::select('bookings.*', 'employees.employee_name', 'customers.firstname', 'services.name', 'services.category')
            ->join('employees', 'bookings.employee_id', '=', 'employees.id')
            ->join('customers', 'bookings.customer_id', '=', 'customers.id')
            ->join('services', 'bookings.service_id', '=', 'services.id')
            ->get();


        return view('frontend.status', compact('bookings'));
    }
}
