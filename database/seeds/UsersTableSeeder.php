<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i <5 ; $i++) { 
    		$u = new App\User;
        	$faker = Faker\Factory::create();
    		$u->name = $faker->name;
        	$u->email = $faker->email;
        	$u->password = Hash::make("password");
        	$u->blocked = false;
        	$u->print_evals = 0;
        	$u->print_counts = 0;
        	$u->department_id = 1;
        	$u->admin = 1;
        	$u->save();
    	}
    }
}
