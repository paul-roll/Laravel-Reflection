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

    protected function validateCompany()
    {
        return request()->validate([
            "name" => ['required'],
            "email" => ['nullable', 'email'],
            // "logo" => $post->exists() ? ['image'] : ['nullable', 'image'],
            "website" => ['nullable'],
        ]);
    }

    public function store()
    {
        $attributes = $this->validateCompany();

        Company::create($attributes);
        
        return redirect('/');
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
