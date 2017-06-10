<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Property\Property::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 5),
        'street_address' => $faker->streetAddress,
        'city' => $faker->city,
        'state_id' => $faker->numberBetween(1, 51),
        'zip' => $faker->numberBetween(20001, 80001),
        'bedrooms' => $faker->numberBetween(2,3),
        'bathrooms' => $faker->numberBetween(1,3),
        'garages' => $faker->numberBetween(1,3),
        'year_built' => $faker->year,
        'living_square_footage' => $faker->numberBetween(1000, 3000),
        'lot_square_footage' => $faker->numberBetween(4000,10000),
        'neighborhood' => $faker->streetName,
    ];
});
