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
    public function view(Request $request, $id)
    {
        // $request->validate([
        //     'customer_id' => 'required|exists:customers,id',
        //     'reservation_date' => 'required|date',
        //     'reservation_time' => 'required',
        //     'status' => 'required|in:pending,confirmed,canceled',
        // ]);

        $customers = Customer::find($id);

   

        return view('admin.reports.view', compact('customers'));
    }
}
