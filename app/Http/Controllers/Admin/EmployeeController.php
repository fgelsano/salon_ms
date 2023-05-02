<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }
    public function create()
    {
        return view('admin.employees.add');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_name' => 'required',
            'rule' => 'required',
            'picture' => 'required',
        ]);
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = $picture->getClientOriginalName();
            $picture->move(public_path('uploads'), $filename);
            $validatedData['picture'] = $filename;
        }

        $employee = Employee::create($validatedData);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
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

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'employee_name' => 'required',
            'rule' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $employee = Employee::find($id);

        $employee->employee_name = $request->input('employee_name');
        $employee->rule = $request->input('rule');

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = $picture->getClientOriginalName();
            $picture->move(public_path('uploads'), $filename);
            $validatedData['picture'] = $filename;
            // delete old picture file
            if ($employee->picture) {
                $oldPicturePath = public_path('uploads/' . $employee->picture);
                if (file_exists($oldPicturePath)) {
                    unlink($oldPicturePath);
                }
            }
        }

        $employee->update($validatedData);

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully');
    }



    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
