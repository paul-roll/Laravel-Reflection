<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        if (User::count() == 0) {
            User::factory(1)->create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password')
            ]);
        }

        $num_companies = 100;
        $num_employees = 200;

        Company::factory($num_companies)->create();
        for ($i = 1; $i <= $num_employees; $i++) {
            if (rand(0,2)) {
                $company_id = rand(1,$num_companies);
                Employee::factory()->create([
                    'company_id' => $company_id,
                ]);
            } else {
                Employee::factory()->create();
            }
            
        }

    }
}
