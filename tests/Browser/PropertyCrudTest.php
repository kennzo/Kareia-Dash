<?php

namespace Tests\Browser;

use DatabaseSeeder;
use Tests\DuskTestCase;

class PropertyCrudTest extends DuskTestCase
{
    /**
     * Test creating a property.
     *
     * @return void
     */
    public function testCreateProperty()
    {
        $this->seed(DatabaseSeeder::class);

        $this->browse(function ($browser) {
            // Login
            $browser->visit('/login')
                ->type('email', 'kenneth.sok@gmail.com')
                ->type('password', 'secret')
                ->press('Login')
                ->pause(100)
                ->assertSee('You are logged in!')
                ->clickLink("Go here for your properties.");

            // Create a Property
            $browser->clickLink("Create Property")
                ->assertSee("Create Property")
                ->type("street_address", "12345 Main St.")
                ->type("city", "Houston")
                ->select("state_id", 43)
                ->type("zip", "77002")
                ->type("bedrooms", "3")
                ->type("bathrooms", "1.5")
                ->type("garages", "2")
                ->type("year_built", "1999")
                ->type("living_square_footage", "1999")
                ->type("lot_square_footage", "5999")
                ->type("neighborhood", "Smallville")
                ->press("Add Property")
                ->pause(500)
            // Read a Property
                ->assertSee("Property successfully added!")
                ->assertSee("Property Address:")
                ->assertSee("12345 Main St.");

            // Update a Property
            $browser->clickLink("Edit")
                ->assertSee("Edit Property")
                ->type("street_address", "54321 2nd St.")
                ->press("Edit Property")
                ->pause(500)
                ->assertSee("Property updated!")
                ->assertSee("54321 2nd St.");

            // Delete a Property
            $browser->clickLink("Delete");
            $browser->acceptDialog()
                ->pause(100);
            $browser->assertSee("Property deleted!")
                ->assertDontSee("54321 2nd St.");
        });
    }
}
