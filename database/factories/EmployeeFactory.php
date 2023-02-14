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

        $email = null;
        if (rand(0,2)) {
            $email = fake()->unique()->freeEmail();
        }
        $phone = null;
        if (rand(0,2)) {
            $phone = fake()->phoneNumber;
        }
        return [
            'first' => fake()->firstName(),
            'last' => fake()->lastName(),
            'email' => $email,
            'phone' => $phone,
        ];
    }
}
