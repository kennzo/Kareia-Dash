<?php

use App\Models\Property\Property;
use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('properties')->insert([
            'user_id' => 2,
            'street_address' => '5421 Smith Dr.',
            'city' => 'Houston',
            'state_id' => 43,
            'zip' => 77003,
            'bedrooms' => 3,
            'bathrooms' => 2,
            'garages' => 2,
            'year_built' => 1980,
            'living_square_footage' => 1000,
            'lot_square_footage' => 5000,
            'neighborhood' => 'Smallville',
        ]);

        factory(App\Models\Property\Property::class, 10)->create();
    }
}
