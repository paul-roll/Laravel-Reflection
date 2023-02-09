<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['index', 'show']);
    }

    public function index()
    {
        // Index all
        return view('company.index', [
            'companies' => Company::latest()->paginate(10)
        ]);
    }

    public function show($id)
    {
        // Show single
        $company = Company::find($id);
        if ($company) {
            return view('company.show', ['company' => $company]);
        } else {
            return redirect('company');
        }
        
    }

    public function create()
    {
        // Shows a view to create a new company
        return view('company.create');
    }

    public function store()
    {
        $attributes = $this->validateCompany();

        if ($attributes['logo'] ?? false) {
            $attributes['logo'] = basename(request()->file('logo')->store('public\\company\\logos'));
        }

        Company::create($attributes);
        
        return redirect('/');
    }

    public function edit(Company $company)
    {
        // Show a view to edit an existing company
        return view('company.edit', ['company' => $company]);
    }

    public function update(Company $company)
    {
        // Persist the edited company
        $attributes = $this->validateCompany();

        if ($attributes['logo'] ?? false) {
            $attributes['logo'] = basename(request()->file('logo')->store('public\\company\\logos'));
            
            if ($company->logo ?? false) {
                unlink(storage_path('app\\public\\company\\logos\\' . $company->logo));
            }
        }

        $company->update($attributes);
      
        return redirect('company/'.$company->id);
    }

    public function destroy(Company $company)
    {
        // Delete the company

        if ($company->logo ?? false) {
            unlink(storage_path('app\\public\\company\\logos\\' . $company->logo));
        }

        $company->delete();
        return back()->with('success', 'Deleted!');
        // return redirect('company')->with('success', 'Deleted!');
    }

    protected function validateCompany(?Company $company = null): array
    {
        return request()->validate([
            "name" => ['required'],
            "email" => ['nullable', 'email'],
            "logo" => ['nullable', 'image'],
            "website" => ['nullable'],
        ]);
    }
}
