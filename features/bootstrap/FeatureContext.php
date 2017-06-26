<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Hook\Scope\AfterStepScope;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Mink\Driver\Selenium2Driver;
use Behat\MinkExtension\Context\MinkContext;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Facade;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    /**
     * The Illuminate application instance.
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * =========================================================================
     * =                  GENERIC CONTEXT ELEMENTS AND HOOKS                   =
     * =========================================================================
     */

    /** @BeforeScenario
     * @param BeforeScenarioScope $scope
     */
    public function before(BeforeScenarioScope $scope)
    {
        if (! $this->app) {
            $this->app = $this->createApplication();
        }

        Facade::clearResolvedInstances();

        $this->resetBrowserSession();
        $this->truncateTables();

        $seeder = App::make(DatabaseSeeder::class);
        $seeder->run();
    }

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = (require dirname(dirname(__DIR__)).'/bootstrap/app.php');
//dd($app);
        $app->make(Kernel::class)->bootstrap();

        $app->make('config')->set('app.url', $this->getMinkParameter('base_url'));

        return $app;
    }

    /**
     * @AfterStep
     *
     * @param AfterStepScope $scope
     */
    public function takeScreenShotAfterFailedStep(AfterStepScope $scope)
    {
        if (99 === $scope->getTestResult()->getResultCode()) {
            $driver = $this->getSession()->getDriver();
            if (!($driver instanceof Selenium2Driver)) {
                return;
            }

            $fileTitle = trim(preg_replace("#[^a-zA-Z0-9\._-]+#", '_', $scope->getStep()->getText()), '_');
            $fileName = env('SCREENSHOT_DIR') . DIRECTORY_SEPARATOR . $fileTitle . '.png';
            file_put_contents($fileName, $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * =========================================================================
     * =                           STEP DEFINITIONS                            =
     * =========================================================================
     */

    /**
     * Reset browsers session.
     *
     * Used to simulate "private browser" environment.
     *
     * @Given I open new browser
     */
    public function resetBrowserSession()
    {
        $this->getSession()->reset();
    }

    /**
     * Logs a non-admin user in and takes them to the home/dashboard page
     *
     * @Given I am logged in and at the dashboard for user id :id
     *
     * @param $id
     *
     * @throws Exception
     */
    public function logged_in_at_dashboard($id)
    {
        if ($id == 1) {
            throw new Exception("Trying to login as admin.");
        }

        // Login using non-admin account
        Auth::loginUsingId($id);

        $this->visitPath('/home');
//        $this->getSession()->visit('/home');

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

    /**
     * A sleep command to allow for hooks to complete.
     *
     * @When I wait for :multiplier second
     *
     * @param int $multiplier Increase wait time the number of times.
     *
     * @uses usleep To delay execution allowing web engine to work.
     */
    public function waitForHooksToComplete($multiplier = 1)
    {
        $exponent = pow(10, 6);
        usleep((int)($exponent * $multiplier));
    }

    /**
     * An assertion that the environment file is correct.
     *
     * @Given I am using :environment env
     *
     * @param string $environment
     *
     * @throws Exception
     */
    public function verifyEnvironment($environment)
    {
        $env = env('APP_ENV');
        if ($env != $environment) {
            throw new Exception("Wrong environment: actual [$env] != expected[$environment]");
        }
    }
}
