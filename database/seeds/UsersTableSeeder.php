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
        /**
         * Seed admin user and add some properties to myself.
         */
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

        /**
         * Seed non-admin user and add some properties to myself.
         */
        DB::table('users')->insert([
            'name' => 'Non Admin',
            'email' => 'non.admin@example.com',
            'password' => bcrypt('secret'),
        ]);

        factory(App\Models\Property\Property::class, 3)
            ->create(['user_id' => 2,])
            ->each(function ($p) {
                $p->rentalEstimates()
                    ->save(factory(App\Models\Estimates\RentalEstimate\RentalEstimate::class)->make([
                        'name' => 'Non-admin rental estimate',
                    ]));
            });

        /**
         * Seed another 3 users
         */
        factory(App\User::class, 3)->create([
            'password' => 'secret',
        ]);
    }
}
