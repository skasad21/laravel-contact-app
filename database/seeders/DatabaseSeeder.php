<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Contact;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call(
        //     CompaniesTableSeeder::class,
        //     ContactsTableSeeder::class,
        // );
        // Company::factory()->count(10)->create();
        // Contact::factory()->count(50)->create();
        User::factory()->count(5)->create()->each(function ($user) {
            Company::factory()->has(
              Contact::factory()->count(5)->state(function ($attributes, Company $company) {
                return ['user_id' => $company->user_id];
              })
            )
            ->count(10)->create([
              'user_id' => $user->id
            ]);
          });
        
    }
}