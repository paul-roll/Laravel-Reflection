<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Http\Requests\ValidateEmployee;
use Request;

class EmployeeController extends Controller
{

    public function index()
    {
        // Index all employees
        return view('employee.index', [
            'employees' => Employee::orderBy('last', 'asc')->orderBy('first', 'asc')->paginate(10)
        ]);
    }

    public function search()
    {
        $search = Request::get('q');
        if ($search == "") {
            return redirect('/employee');
        }

        $searchValues = preg_split('/\s+/', $search, -1, PREG_SPLIT_NO_EMPTY);
        $results = Employee::where(function ($q) use ($searchValues) {
            foreach ($searchValues as $value) {
                $q->orWhere('first', 'like', '%' . $value . '%')->orWhere('last', 'like', '%' . $value . '%');
            }
        })->orderBy('last', 'asc')->orderBy('first', 'asc')->paginate(10)->setPath('');

        $results->appends(array(
            'q' => Request::get('q')
        ));

        return view('employee.index', [
            'employees' => $results,
            'search' => $search
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
        return view('employee.create', ['companies' => Company::all()->sortBy('name')]);
    }

    public function store(ValidateEmployee $request)
    {
        $attributes = $request->validated();

        $employee = Employee::create($attributes);
        return redirect('employee/' . $employee->id)->with('success', 'Employee \'' .  $employee->first . ' ' . $employee->last . '\' created.');
    }

    public function edit(Employee $employee)
    {
        // Show a view to edit an existing employee
        return view('employee.edit', ['employee' => $employee, 'companies' => Company::all()->sortBy('name')]);
    }

    public function update(Employee $employee, ValidateEmployee $request)
    {
        // Persist the edited employee
        $attributes = $request->validated();

        $employee->update($attributes);

        return redirect('employee/' . $employee->id)->with('success', 'Employee \'' .  $employee->first . ' ' . $employee->last . '\' updated.');
    }

    public function destroy(Employee $employee)
    {
        // Delete the employee

        $employee->delete();
        return redirect('employee')->with('success', 'Employee \'' . $employee->first . ' ' . $employee->last . '\' deleted.');
    }
}
