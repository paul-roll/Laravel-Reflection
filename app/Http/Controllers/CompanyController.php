<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Request;

class CompanyController extends Controller
{
    public function index()
    {
        // Index all
        return view('company.index', [
            'companies' => Company::latest()->paginate(10)
        ]);
    }

    public function search()
    {
        $search = Request::get ( 'q' );
        if($search == ""){
            return redirect('/company');
        }

        $results = Company::where('name', 'LIKE', '%' . $search . '%')->paginate(10)->setPath('');
        $results->appends ( array (
            'q' => Request::get ( 'q' ) 
          ) );

        return view('company.index', [
            'companies' => $results
        ])->withMessage('Search Compaines: \'' . $search . '\'');
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
            $attributes['logo'] = basename(request()->file('logo')->store('public/company/logos'));
        }

        $company = Company::create($attributes);
        // return redirect('company/' . $company["id"]);
        return redirect('company/' . $company->id);
    }

    public function edit(Company $company)
    {
        // Show a view to edit an existing company
        return view('company.edit', ['company' => $company]);
    }

    public function update(Company $company)
    {

        if (isset($_POST['removeLogo'])) {
            if ($company->logo ?? false) {
                unlink(storage_path('app/public/company/logos/' . $company->logo));
            }
            $company->update(['logo' => null]);
            return back()->withInput();
        }

        // Persist the edited company
        $attributes = $this->validateCompany();

        if ($attributes['logo'] ?? false) {
            $attributes['logo'] = basename(request()->file('logo')->store('public/company/logos'));

            if ($company->logo ?? false) {
                unlink(storage_path('app/public/company/logos/' . $company->logo));
            }
        }

        $company->update($attributes);

        return redirect('company/' . $company->id);
    }

    public function destroy(Company $company)
    {
        // Delete the company

        if ($company->logo ?? false) {
            unlink(storage_path('app/public/company/logos/' . $company->logo));
        }

        $company->delete();
        return redirect('company')->with('success', 'Deleted!');
    }

    protected function validateCompany(?Company $company = null): array
    {
        return request()->validate([
            "name" => ['required'],
            "email" => ['nullable', 'email:rfc,dns'],
            "logo" => ['nullable', 'image', 'dimensions:min_width=100,min_height=100'],
            "website" => ['nullable', 'url'],
        ]);
    }
}
