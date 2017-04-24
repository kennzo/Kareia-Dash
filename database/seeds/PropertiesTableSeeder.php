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
//        factory(App\User::class, 50)->create()->each(function ($u) {
//            $u->posts()->save(factory(App\Post::class)->make());
//        });

        $property1 = new Property([
            'user_id' => 1,
            'street_address' => '123 Main St.',
            'city' => 'Houston',
            'state_id' => rand(1, 50),
            'zip' => "77004",
            'bedrooms' => 3,
            'bathrooms' => 2,
            'garages' => 2,
            'year_built' => 1990,
            'living_square_footage' => 1200,
            'lot_square_footage' => 5000,
            'neighborhood' => 'Silverdale',
        ]);
        $property1->save();

        $property2 = new Property([
            'user_id' => '1',
            'street_address' => '3208 Yellowstone Park Dr.',
            'city' => 'Houston',
            'state_id' => 43,
            'zip' => "77054",
            'bedrooms' => 3,
            'bathrooms' => 2.5,
            'garages' => 2,
            'year_built' => 1995,
            'living_square_footage' => 2200,
            'lot_square_footage' => 6000,
            'neighborhood' => 'Avendale',
        ]);
        $property2->save();

        $property3 = new Property([
            'user_id' => '1',
            'street_address' => '10015 Halston Dr.',
            'city' => 'Sugar Land',
            'state_id' => 43,
            'zip' => "77498",
            'bedrooms' => 4,
            'bathrooms' => 2,
            'garages' => 3,
            'year_built' => 2000,
            'living_square_footage' => 3201,
            'lot_square_footage' => 7000,
            'neighborhood' => 'Kingsbridge Woods',
        ]);
        $property3->save();

        $property4 = new Property([
            'user_id' => '2',
            'street_address' => '5421 Smith Dr.',
            'city' => 'Ft. Lauderdale',
            'state_id' => 9,
            'zip' => "44561",
            'bedrooms' => 4,
            'bathrooms' => 2.5,
            'garages' => 2,
            'year_built' => 2002,
            'living_square_footage' => 1531,
            'lot_square_footage' => 9000,
            'neighborhood' => 'Waywoods',
        ]);
        $property4->save();

        $property5 = new Property([
            'user_id' => '2',
            'street_address' => '16712 Jeff Dr.',
            'city' => 'Atlanta',
            'state_id' => 10,
            'zip' => "12345",
            'bedrooms' => 3,
            'bathrooms' => 1,
            'garages' => 1,
            'year_built' => 2005,
            'living_square_footage' => 2211,
            'lot_square_footage' => 9000,
            'neighborhood' => 'Fire Oak',
        ]);
        $property5->save();
    }
}
