<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateEmployee extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "first" => ['required', 'regex:"^[a-zA-Z ,.\'-]+$"', 'max:255'],
            "last" => ['required', 'regex:"^[a-zA-Z ,.\'-]+$"', 'max:255'],
            "company_id" => ['nullable', 'exists:companies,id'],
            "email" => ['nullable', 'email:rfc,dns', 'max:255'],
            "phone" => ['nullable', 'regex:"^(\+{0,1}\d{1,3}[\s.-]?)?\(?\d{3,5}\)?[\s.-]?\d{3}[\s.-]?\d{3,4}$"'],
        ];
    }
}
