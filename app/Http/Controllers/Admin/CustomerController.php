<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;
// dire nako gi copy ang gkn sa booking kdto naay duha ka use sa ubos sa request


class CustomerController extends Controller
{
    public function index() {
        
        
        $customers = Customer::all();

        return view('admin.customers.index', compact('customers'));
    } 
}
