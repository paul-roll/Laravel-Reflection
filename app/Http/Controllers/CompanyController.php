<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    
    public function index()
    {
        // Index all
        $companies = Company::latest()->get();

        return view('company.index', ['companies' => $companies]);
    }

    public function show($id)
    {
        // Show single
        $company = Company::find($id);
        if ($company) {
            return view('company.show', ['company' => $company]);
        } else {
            return redirect('companies');
        }
        
    }

    public function create()
    {
        // Shows a view to create a new resource
    }

    public function store()
    {
        // Persist the new resource
    }

    public function edit()
    {
        // Show a view to edit an existing resource
    }

    public function update()
    {
        // Persist the edited resource
    }

    public function destroy()
    {
        // Delete the resource
    }

}
