<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $response = $this->browse(function (Browser $browser) {
            /** Browser */
            $browser->visit('/')
                    ->assertSee('Kareia-Dashboard');
            ;
        });
    }
}
