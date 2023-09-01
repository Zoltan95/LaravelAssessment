<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $company = Company::factory()->create([
            'company_name'=>'Blue Storm'
        ]);

        Employee::factory(5)->create([
            'company_id'=> $company->id
        ]);

        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@admin.com',
             'password' => 'password',
         ]);
    }
}
