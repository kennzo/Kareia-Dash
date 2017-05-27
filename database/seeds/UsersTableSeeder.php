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

        factory(App\User::class, 4)->create([
            'password' => 'secret',
        ]);
    }
}
