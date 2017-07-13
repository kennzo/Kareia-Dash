<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Estimates\RentalEstimate\RentalEstimate::class, function (Faker\Generator $faker) {
    return [
        'property_id' => $faker->numberBetween(1, 13),
        'name' => $faker->company,
        'arv' => $faker->numberBetween(50000, 250000),
        'purchase_price' => $faker->numberBetween(25000, 250000),
        'repairs' => $faker->numberBetween(0, 50000),
        'financed' => $faker->boolean(),
        'total_loan_amount' => $faker->numberBetween(25000, 250000),
        'interest_rate' => $faker->randomFloat(null, 0, 1),
        'term' => $faker->numberBetween(1, 20),
        'rental_arv' => $faker->numberBetween(1000, 2500),
        'other_income' => $faker->numberBetween(50, 250),
        'annual_taxes' => $faker->numberBetween(1000, 2500),
        'insurance' => $faker->numberBetween(750, 2500),
        'hoa' => $faker->numberBetween(300, 1200),
        'use_property_management' => $faker->boolean(),
        'property_management_fee' => $faker->numberBetween(100,200),
        'capital_expenditures' => $faker->numberBetween(250,500),
        'vacancy' => $faker->numberBetween(100, 200),
        'monthly_repairs' => $faker->numberBetween(100, 250),
    ];
});
