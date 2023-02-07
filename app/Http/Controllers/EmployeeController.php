<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        // Index all
        $employees = Employee::latest()->get();

        return view('employee.index', ['employees' => $employees]);
    }

    public function show($id)
    {
        // Show single
        $employee = Employee::find($id);
        if ($employee) {
            return view('employee.show', ['employee' => $employee]);
        } else {
            return redirect('employees');
        }
        
    }
}
