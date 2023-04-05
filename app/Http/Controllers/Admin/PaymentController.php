<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Booking;

class PaymentController extends Controller
{
    //
    public function index() {
        
        $payments = Payment::all();
        

        return view('admin.payments.index', compact('payments'));
    }
}
