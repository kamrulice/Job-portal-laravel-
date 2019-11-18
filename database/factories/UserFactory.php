<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Company;
use App\Job;
use App\Category;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_type'=> 'Seeker',
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Company::class, function(Faker $faker){
    return [
        'user_id'=> App\User::all()->random()->id,
        'cname' => $title = $faker->company,
        'slug' => str_slug($title),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'website' => $faker->domainName,
        'logo' => 'avatar/logo.png',
        'cover_photo' => 'cover/header.jpg',
        'slogan' => 'Learn-Earn and grow',
        'description' =>  $faker->paragraph(rand(2,10)),
    ];
});

$factory->define(App\Job::class, function(Faker $faker){
    return [
        'user_id'=> App\User::all()->random()->id,
      'company_id'=> App\User::all()->random()->id,
        'title' => $name = $faker->text,
        'slug' => str_slug($name),
        'roles' => $faker->text,
        'description' => $faker->paragraph(rand(2,10)),
        'category_id' =>rand(0,1),
        'position' => $faker->jobTitle,
        'address' => $faker->address,
        'type' => 'fulltime',
        'status' => rand(0,1),
        'last_date' =>  $faker->dateTime,
    ];
});