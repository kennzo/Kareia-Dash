<?php

use Illuminate\Database\Seeder;

class RentalEstimatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Estimates\RentalEstimate\RentalEstimate::class, 10)->create();
    }
}
