<?php

namespace Tests\Browser\Property;

use DatabaseSeeder;
use Tests\DuskTestCase;

class PropertyCrudTest extends DuskTestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->runDatabaseMigrations();
        $this->seed(DatabaseSeeder::class);
    }

    /**
     * Test creating a property.
     *
     * @return void
     */
    public function testCrudProperty()
    {
        $this->browse(function ($browser) {
            // Login
            $browser->visit('/login')
                ->type('email', 'kenneth.sok@gmail.com')
                ->type('password', 'secret')
                ->press('Login')
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
            // Read a Property
                ->assertSee("Property Address:")
                ->assertSee("12345 Main St.");

            // Update a Property
            $browser->clickLink("Edit")
                ->assertSee("Edit Property")
                ->type("street_address", "54321 2nd St.")
                ->press("Edit Property")
                ->assertSee("54321 2nd St.")
                ->assertDontSee("12345 Main St.");

            // Delete a Property
            $browser->press("Delete");
            $browser->acceptDialog()
                ->assertDontSee("54321 2nd St.");
        });
    }

    /**
     * Verifies that when trying to improperly creating/editing properties,
     * it will fail accordingly and show a failure message.
     */
    public function testFailedCrudProperty()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                ->type('email', 'kenneth.sok@gmail.com')
                ->type('password', 'secret')
                ->press('Login')
                ->assertSee('You are logged in!')
                ->clickLink("Go here for your properties.");
            // Create a Property
            $browser->clickLink("Create Property")
                ->assertSee("Create Property")
                ->press("Add Property")
                ->assertSee("Oops! There were some errors:")
                ->assertSee("The street address field is required.")
                ->assertSee("The city field is required.")
                ->assertSee("The state id field is required.")
                ->assertSee("The zip field is required.");
            // Edit a Property
            $browser->visit('/property/1/edit')
                ->type("street_address", "")
                ->press("Edit Property")
                ->assertSee("Oops! There were some errors:")
                ->assertSee("The street address field is required.");
        });
    }
}
