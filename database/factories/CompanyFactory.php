<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->company();

        $email = null;
        if (rand(0,1)) {
            $email = fake()->unique()->companyEmail();
        }
        
        $logo = null;
        if (rand(0,1)) {
            // $logo = fake()->image(public_path('img\\company\\logos'), 100, 100, null, true, true, $name);
            $logo = 'img\\company\\logos\\' . fake()->image(public_path('img/company/logos'), 100, 100, null, false, true, $name);
        }

        $website = null;
        if (rand(0,1)) {
            $website = 'http://' . str_replace([' ', ','],'',$name) . '.com';
        }
        return [
            'name' => $name,
            'email' => $email,
            'logo' => $logo,
            'website' => $website,
        ];
    }
}
