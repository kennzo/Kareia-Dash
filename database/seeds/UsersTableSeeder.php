<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Kenneth Sok',
            'email' => 'kenneth.sok@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        factory(App\Models\Property\Property::class, 3)
            ->create(['user_id' => 1,])
            ->each(function ($p) {
                $p->rentalEstimates()
                    ->save(factory(App\Models\Estimates\RentalEstimate\RentalEstimate::class)->make([
                        'name' => 'Kenneth rental estimate',
                    ]));
            });
        ;

        factory(App\User::class, 4)->create([
            'password' => 'secret',
        ]);
    }
}
