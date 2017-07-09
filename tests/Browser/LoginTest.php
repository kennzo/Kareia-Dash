<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use UsersTableSeeder;

class LoginTest extends DuskTestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->runDatabaseMigrations();
        $this->seed(UsersTableSeeder::class);
    }

    /**
     * A test for unsuccessful login.
     */
    public function testFailedLogin()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                ->type('email', 'kenneth.sok@gmail.com')
                ->type('password', 'badPassword')
                ->press('Login')
                ->assertDontSee('You are logged in!');
        });
    }

    /**
     * A test for successful login.
     */
    public function testLogin()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                ->type('email', 'kenneth.sok@gmail.com')
                ->type('password', 'secret')
                ->press('Login')
                ->pause(100)
                ->assertSee('You are logged in!');
        });
    }
}
