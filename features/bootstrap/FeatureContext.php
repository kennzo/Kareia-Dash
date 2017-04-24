<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->truncateTables();

        $seeder = App::make(DatabaseSeeder::class);
        $seeder->run();
    }

//    public function takeScreenshotAfterFailedStep()
//    {
//        $this->getSession()->getScreenshot()
//    }

    /**
     * Logs a non-admin user in and takes them to the home/dashboard page
     *
     * @Given I am logged in and at the dashboard
     */
    public function logged_in_at_dashboard()
    {
        // Login using non-admin account
        Auth::loginUsingId(2);

        $this->getSession()->visit('/home');

        $this->assertPageAddress('/home');
    }

    /**
     * =========================================================================
     * =                  GENERIC FUNCTIONS                                    =
     * =========================================================================
     */

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
