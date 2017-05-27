<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() == 'production') {
            throw new RuntimeException('Seeders should never run in production!');
        }

        if (App::environment() == 'local' || App::environment() == 'staging') {
            $this->truncateTables();
            $this->call(UsersTableSeeder::class);
            $this->call(PropertiesTableSeeder::class);
            $this->call(RentalEstimatesTableSeeder::class);
        }

        if (App::environment() == 'testing') {
            $this->truncateTables();
            $this->call(UsersTableSeeder::class);
            $this->call(PropertiesTableSeeder::class);
            $this->call(RentalEstimatesTableSeeder::class);
        }

    }

    /**
     * Empty the tables
     */
    public function truncateTables()
    {
        $tables = [
            'properties',
            'users',
        ];

        DB::unprepared('TRUNCATE TABLE ' . implode(',', $tables) . ' RESTART IDENTITY CASCADE');
    }
}
