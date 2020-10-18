<?php

namespace Database\Factories;

use App\Models\Contact;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

$factory->define(Contact::class, function(Faker $faker){
    return [
        'name'  =>   $faker->name,
        'phonr' =>  $faker->e164PhoneNumber
    ];
});

// class ContactFactory extends Factory
// {
//     /**
//      * The name of the factory's corresponding model.
//      *
//      * @var string
//      */
//     protected $model = Contact::class;

//     /**
//      * Define the model's default state.
//      *
//      * @return array
//      */
//     public function definition()
//     {
//         return [
//             //
//         ];
//     }
// }
