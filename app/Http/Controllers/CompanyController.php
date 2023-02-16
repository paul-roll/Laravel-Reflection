<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\ValidateCompany;
use Request;

class CompanyController extends Controller
{
    public function index()
    {
        // Index all
        return view('company.index', [
            'companies' => Company::latest('updated_at')->paginate(10)
        ]);
    }

    public function search()
    {
        $search = Request::get ( 'q' );
        if($search == ""){
            return redirect('/company');
        }

        $searchValues = preg_split('/\s+/', $search, -1, PREG_SPLIT_NO_EMPTY);
        $results = Company::where(function ($q) use ($searchValues) {
            foreach ($searchValues as $value) {
                $q->orWhere('name', 'like', '%' . $value . '%');
            }
        })->latest('updated_at')->paginate(10)->setPath('');

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

    public function store(ValidateCompany $request)
    {
        $attributes = $request->validated();

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

    public function update(Company $company, ValidateCompany $request)
    {

        if (isset($_POST['removeLogo'])) {
            if ($company->logo ?? false) {
                unlink(storage_path('app/public/company/logos/' . $company->logo));
            }
            $company->update(['logo' => null]);
            return back()->withInput();
        }

        // Persist the edited company
        $attributes = $request->validated();

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
}
