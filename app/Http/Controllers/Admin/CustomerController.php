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
    /**
     * Display existing record from database
     */
    public function edit(Request $request)
    {
        $customer = customer::find($request->id);
        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update existing record to database
     */
    public function update(Request $request) 
    {
        // get id of the requested to update
        // save request
    }

    /**
     * Display empty form to add new record
     */
    public function create() {
        return view('admin.customers.add');
    }

    /**
     * Save new record to database
     */
    public function store(Request $request) 
    {
        // create new instance of the model
        // save record
    }

    /**
     * Delete existing records from database
     */
    public function delete(Request $request) {
        

    }
}
