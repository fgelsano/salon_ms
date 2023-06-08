<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service;

class ServiceController extends Controller
{
    //
    public function index()
    {
        $services = Service::paginate(10);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Display existing record from database
     */
    public function edit($id)
    {
        $service = Service::findOrfail($id);

        return view('admin.services.edit', compact('service'));
    }


    /**
     * Update existing record to database
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required',
            'price' => 'required',

        ]);
        $service = Service::find($id);

        $service->name = $request->input('name');


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('uploads'), $filename);
            $validatedData['image'] = $filename;

            if ($service->image) {
                $oldPicturePath = public_path('uploads/' . $service->image);
                if (file_exists($oldPicturePath)) {
                    unlink($oldPicturePath);
                }
            }
        } else {
            // no new picture uploaded, keep existing picture
            $validatedData['picture'] = $service->image;
        }


        $service->category = $request->input('category');
        $service->price = $request->input('price');

        $service->update($validatedData);
        return redirect()->route('services.index')
            ->with('success', 'Service updated successfully!');
    }




    /**
     * Display empty form to add new record
     */
    public function create()
    {
        return view('admin.services.add');
    }


    /**
     * Save new record to database
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'required',
            'category' => 'required',
            'price' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('uploads'), $filename);
            $validatedData['image'] = $filename;
        }

        $service = Service::create($validatedData);

        if ($service) {
            return redirect()->route('services.index')->with('success', 'Service created successfully!');
        } else {
            return back()->withInput()->with('error', 'Error creating service.');
        }
    }



    /**
     * Delete existing records from database
     */


    // public function destroy(Service $service)
    // {
    //     $service->delete();
    //     return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    // }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
