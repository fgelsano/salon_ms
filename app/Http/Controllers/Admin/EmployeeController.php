<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Service;


class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::select('employees.*', 'services.name')
        ->join('services', 'employees.services_id', '=', 'services.id')
        ->get();

        return view('admin.employees.index', compact('employees'));
    }
    public function create(Request $request)
    {
        $employees = Employee::find($request->id);
        $services = Service::all();

        return view('admin.employees.add', compact(['employees', 'services',]));
    }
    public function store(Request $request)
    {
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = $picture->getClientOriginalName();
            $picture->move(public_path('uploads'), $filename);
            $validatedData['picture'] = $filename;
        }
        
        $employees = new Employee;
        $employees->employee_name = $request->input('employee_name');
        $employees->services_id = $request->input('service_id');
        $employees->rule = $request->input('rule');
        $employees->available = $request->input('availability');
        
        if ($request->hasFile('picture')) {
            $employees->picture = $filename;
        }
        
        if ($employees->save()) {
            return redirect()->route('employees.index')->with('success', 'Employee created successfully!');
        } else {
            return back()->withInput()->with('error', 'Error creating employee.');
        }
        
    }
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('admin.employees.edit', compact('employee'));
    }

    // public function update(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'employee_name' => 'required',
    //         'rule' => 'required',
    //         'picture' => 'image|mimes:jpeg,png,jpg,gif,svg',
    //     ]);

    //     $employee = Employee::find($id);

    //     $employee->employee_name = $request->input('employee_name');
    //     $employee->rule = $request->input('rule');

    //     if ($request->hasFile('picture')) {
    //         $picture = $request->file('picture');
    //         $filename = $picture->getClientOriginalName();
    //         $picture->move(public_path('uploads'), $filename);
    //         $validatedData['picture'] = $filename;
    //         // delete old picture file
    //         if ($employee->picture) {
    //             $oldPicturePath = public_path('uploads/' . $employee->picture);
    //             if (file_exists($oldPicturePath)) {
    //                 unlink($oldPicturePath);
    //             }
    //         }
    //     }

    //     $employee->update($validatedData);

    //     return redirect()->route('employees.index')
    //         ->with('success', 'Employee updated successfully');
    // }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'employee_name' => 'required',
            'rule' => 'required',
            'availability' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg',

        ]);

        $employee = Employee::find($id);

        $employee->employee_name = $request->input('employee_name');
        $employee->rule = $request->input('rule');
        $employee->available = $request->input('availability');

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = $picture->getClientOriginalName();
            $picture->move(public_path('uploads'), $filename);
            $validatedData['picture'] = $filename;
          
            if ($employee->picture) {
                $oldPicturePath = public_path('uploads/' . $employee->picture);
                if (file_exists($oldPicturePath)) {
                    unlink($oldPicturePath);
                }
            }
        } else {
            // no new picture uploaded, keep existing picture
            $validatedData['picture'] = $employee->picture;
        }

        $employee->update($validatedData);

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }




    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
