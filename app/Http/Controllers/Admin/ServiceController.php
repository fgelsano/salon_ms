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
    public function update(Request $request, $id)
{
    $service = Service::find($id);

    $service->name = $request->name;
    $service->description = $request->description;
    $service->category = $request->category;
    $service->save();

    return redirect()->route('services.index')->with('success', 'Service updated successfully!');
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
        $service = Service::create([
            
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'category' => $request->input('category')
        ]);
    
        if ($service) {
            return redirect()->route('services.index')->with('success', 'Service created successfully!');
        } else {
            return back()->withInput()->with('error', 'Error creating service.');
        }
    }

    
    /**
     * Delete existing records from database
     */
    

    public function destroy(Service $service)
{
    $service->delete();
    return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
}


}

