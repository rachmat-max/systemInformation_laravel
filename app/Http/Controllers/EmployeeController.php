<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Display all employees
    public function index()
    {
        $employees = Employee::all(); // Get all employees
        return view('employees.index', compact('employees'));
    }

    // Show form for creating a new user
    public function create()
    {
        return view('employees.create');
    }

    // Store a newly created user in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:employees,email',
            'position' => 'required|max:255',
            'salary' => 'required|max:255',
        ]);

        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'position' => $request->position,
            'salary' => $request->salary,
        ]);

        return redirect()->route('employees.index');
    }

    // Show the form to edit a employee
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    // Update an existing employee in the database
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'position' => 'required|max:255',
            'salary' => 'required|max:255',
        ]);

        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
            'position' => $request->position,
            'salary' => $request->salary
        ]);

        return redirect()->route('employees.index');
    }

    // Delete a employee
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
