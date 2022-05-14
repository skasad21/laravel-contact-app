<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // This will delete all the previous records from the table
        //DB::table('companies')->delete(); 

        // $companies = [];
        // $faker = Faker::create();

        // foreach(range(1,10) as $index){
        //     $companies[] = [
                
        //         'created_at'=>now(),
        //         'created_at'=>now() 
        //     ];
        // }

        // DB::table('companies')->insert($companies);

        //Company::factory()->count(10)->create();

        //We dont need this file actually
        
    }
}