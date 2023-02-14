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

        // make folders if they don't exist
        if (!file_exists(storage_path('app/public/company/logos'))) {
            mkdir(storage_path('app/public/company/logos'), 0755, true);
        }

        $name = fake()->company();

        $email = null;
        if (rand(0, 2)) {
            $email = fake()->unique()->companyEmail();
        }

        $logo = null;
        if (rand(0, 2)) {
            // $logo = fake()->image(public_path('img\\company\\logos'), 100, 100, null, true, true, $name);
            // $logo = 'img\\company\\logos\\' . fake()->image(public_path('img/company/logos'), 100, 100, null, false, true, $name);
            // $logo = 'storage\\company\\logos\\' . fake()->image(public_path('storage/company/logos'), 100, 100, null, false, true, $name);
            $logo = fake()->image(storage_path('app/public/company/logos'), 100, 100, null, false, true, $name);
        }

        $website = null;
        if (rand(0, 2)) {
            // $website = str_replace([' ', ','], '', $name) . '.com';
            $website = 'http://' . fake()->domainName();
        }
        return [
            'name' => $name,
            'email' => $email,
            'logo' => $logo,
            'website' => $website,
        ];
    }
}
