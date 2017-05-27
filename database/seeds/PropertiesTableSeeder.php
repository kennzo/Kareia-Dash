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
        factory(App\Models\Property\Property::class, 3)->create([
            'user_id' => 3,
        ]);

        factory(App\Models\Property\Property::class, 10)->create();
    }
}
