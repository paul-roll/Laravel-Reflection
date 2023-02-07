<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $company = rand(0,10);
        if (!$company) {
            $company = null;
        }
        return [
            'first' => fake()->firstName(),
            'last' => fake()->lastName(),
            'company_id' => $company,
            'email' => fake()->unique()->companyEmail(),
            'phone' => fake()->phoneNumber,
        ];
    }
}
