<?php

namespace Tests;

use Carbon\Carbon;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
//    use MakesHttpRequests;

    /**
     * Specifies which `Seeder` class will be used by each Test Case.
     * Leave null to keep any seeders from being run.
     *
     * @var String
     */
    protected $seeder = null;

    /**
     * Faker is used for generating objects/entities for testing.
     *
     * @var Generator;
     */
    public $faker;

    /**
     * Run before each test
     */
    public function setUp()
    {
        parent::setUp();
        $this->setupFaker();
        $this->seed($this->seeder);
    }

    /**
     * Run after each test.  Resets the Carbon test timestamp and
     * closes any open db connections.
     */
    public function tearDown()
    {
        Carbon::setTestNow();
        $this->tearDownDb();
        parent::tearDown();
    }

    public function setupFaker()
    {
        $this->faker = Factory::create('en_US');
        // todo: Setup FakerZipCodeProvider and PhoneNumberProvider
//        $this->faker->addProvider(new FakerZipCodeProvider($this->faker));
//        $this->faker->addProvider(new FakerPhoneNumberProvider($this->faker));
    }

    /**
     * Return, optionally initiating, faker generator with our custom providers.
     *
     * @return Generator
     */
    public function getFaker()
    {
        if (!($this->faker instanceof Generator)) {
            $this->setupFaker();
        }

        return $this->faker;
    }

    /**
     * Close all connections on tear down so we don't get the
     * 'too many connections' exception.
     */
    public function tearDownDb()
    {
        // if framework failed to load nothing needs to be done.
        if (null === $this->app) {
            return;
        }

        // close native connections
        foreach ($this->app['db']->getConnections() as $connection) {
            $connection->disconnect();
        }
    }
}
