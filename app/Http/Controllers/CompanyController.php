<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']); 
    }

    public function index()
    {
        // Index all

        // $companies = Company::latest()->get();
        // return view('company.index', [
        //     'companies' => $companies
        // ]);

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
        // Shows a view to create a new resource

        return view('company.create');
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


    public function store()
    {
        $attributes = $this->validateCompany();

        if ($attributes['logo'] ?? false) {
            $attributes['logo'] = 'storage\\' . request()->file('logo')->store('company\\logos');
        }

        Company::create($attributes);
        
        return redirect('/');
    }

    public function edit(Company $company)
    {
        // Show a view to edit an existing resource
        return view('company.edit', ['company' => $company]);
        // return view('company.edit');
    }

    public function update(Company $company)
    {
        // Persist the edited resource

        $attributes = $this->validateCompany();

        if ($attributes['logo'] ?? false) {
            $attributes['logo'] = basename(request()->file('logo')->store('public\\company\\logos'));
            unlink(storage_path('app\\public\\company\\logos\\' . $company->logo));
        }

        $company->update($attributes);
      
        // return redirect('/company/{{ $company->id }}');
        return redirect('company/'.$company->id);
        // return back()->with('success', 'Post Updated!');
    }

    public function destroy()
    {
        // Delete the resource
    }

}
