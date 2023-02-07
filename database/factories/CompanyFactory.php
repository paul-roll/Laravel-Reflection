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
        $website = null;
        if (rand(0,1)) {
            $website = 'http://' . str_replace([' ', ','],'',$name) . '.com';
        }
        return [
            'name' => $name,
            'email' => fake()->unique()->companyEmail(),
            'logo' => fake()->image(dirname(__DIR__,2).'\public\test'),
            'website' => $website,
        ];
    }
}
