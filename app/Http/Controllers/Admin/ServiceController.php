<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service;
class ServiceController extends Controller
{
    //
    public function index() {
        
        
        $services = Service::all();

        return view('admin.services.index', compact('services'));
    } 

    /**
     * Display existing record from database
     */
    public function edit(Request $request)
    {
        $service = Service::find($request->id);
        return view('admin.services.edit', compact('service'));
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
        return view('admin.services.add');
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
