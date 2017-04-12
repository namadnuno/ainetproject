<?php

use Illuminate\Database\Seeder;

class DepartamentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 6 ; $i++) { 
        	$d = new App\Departament;
        	$d->name = $faker->catchPhrase;
        	$d->save();
        }
    }
}
