<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class ReportController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('admin.reports.index', compact('customers'));
    }
}
