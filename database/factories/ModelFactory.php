<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function () {
	$faker = Faker\Factory::create('pt_PT');
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'blocked' => false,
        'print_evals' => 0,
        'print_counts' => 0,
        'department_id' => 1,
        'admin' => 1,
    ];
});

$factory->define(App\Departament::class, function () {
	$faker = Faker\Factory::create('pt_PT');
	return [
		'name' => $faker->name
	];
});