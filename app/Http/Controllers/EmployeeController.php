<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        // Index all employees
        return view('employee.index', [
            'employees' => Employee::latest()->paginate(10)
        ]);
    }

    public function show($id)
    {
        // Show single employee
        $employee = Employee::find($id);
        if ($employee) {
            return view('employee.show', ['employee' => $employee]);
        } else {
            return redirect('employee');
        }
    }

    public function create()
    {
        // Shows a view to create a new employee
        return view('employee.create', ['companies' => Company::all()]);
    }

    public function store()
    {
        $attributes = $this->validateEmployee();

        $employee = Employee::create($attributes);
        return redirect('employee/' . $employee->id);
    }

    public function edit(Employee $employee)
    {
        // Show a view to edit an existing employee
        return view('employee.edit', ['employee' => $employee, 'companies' => Company::all()]);
    }

    public function update(Employee $employee)
    {
        // Persist the edited employee
        $attributes = $this->validateEmployee();

        $employee->update($attributes);

        return redirect('employee/' . $employee->id);
    }

    public function destroy(Employee $employee)
    {
        // Delete the employee

        $employee->delete();
        return redirect('employee')->with('success', 'Deleted!');
    }

    protected function validateEmployee(?Employee $employee = null): array
    {
        return request()->validate([
            "first" => ['required'],
            "last" => ['required'],
            "company_id" => ['nullable', 'exists:companies,id'],
            "email" => ['nullable', 'email:rfc,dns'],
            "phone" => ['nullable', 'regex:"^[+]{0,1}(?:\d[\s\-().]{0,2}){11,13}$"'],
        ]);
    }
}
