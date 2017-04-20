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

        $property = new Property([
            'street_address' => '123 Main St.',
            'city' => 'Houston',
            'state_id' => rand(1, 50),
            'zip' => "77004"
        ]);
        $property->save();

        $property = new Property([
            'street_address' => '3208 Yellowstone Park Dr.',
            'city' => 'Houston',
            'state_id' => 43,
            'zip' => "77054"
        ]);
        $property->save();

        $property = new Property([
            'street_address' => '10015 Halston Dr.',
            'city' => 'Sugar Land',
            'state_id' => 43,
            'zip' => "77498"
        ]);
        $property->save();

    }
}
