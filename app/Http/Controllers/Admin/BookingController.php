<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Customer;

class BookingController extends Controller
{
    public function index() {
        
        $bookings = Booking::all();
        $customers = Customer::all();

        return view('admin.bookings.index', compact('bookings', 'customers'));
    }
}
