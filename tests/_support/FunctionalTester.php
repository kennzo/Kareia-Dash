<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = null)
 *
 * @SuppressWarnings(PHPMD)
 */
class FunctionalTester extends \Codeception\Actor
{
    use _generated\FunctionalTesterActions;

    protected $faker;

    public function __construct(\Codeception\Scenario $scenario)
    {
        parent::__construct($scenario);

        $this->faker = Faker\Factory::create();
    }

    /**************************************************
     * Define custom actions here
     **************************************************/

    /**
     * Login as user.
     *
     * @param $name
     * @param $password
     */
    public function login($name, $password)
    {
        $I = $this;
        $I->amOnPage('/login');
        $I->submitForm('form', [
            'email'    => $name,
            'password' => $password
        ]);
        $I->see("You are logged in!");
    }

    /**
     * Creates a new user with the parameters provided. If none set,
     * then set some fake ones as default.
     *
     * @param array $params
     *
     * @return int $id User Id
     */
    public function createNewUserAndLogin($params = [])
    {
        $defaults = [
            'name'     => $this->faker->name(),
            'email'    => $this->faker->email,
            'password' => $this->faker->password()
        ];

        $formFields                          = array_merge($defaults, $params);
        $formFields['password_confirmation'] = $formFields['password'];

        $I = $this;
        $I->amOnPage('/register');
        $I->submitForm('form', $formFields);
        $I->see('You are logged in!');
        $I->seeRecord('users', [
            'name'  => $formFields['name'],
            'email' => $formFields['email'],
        ]);

        return $I->grabFromDatabase('users', 'id', [
            'name'  => $formFields['name'],
            'email' => $formFields['email']
        ]);
    }

    /**
     * Creates an arbitrary property for whatever user is logged in.
     *
     * @return int $id Id of property created.
     */
    public function createPropertyForUser()
    {
        $minimumAttributesProperty = [
            'street_address' => $this->faker->streetAddress,
            'city'           => $this->faker->city,
            'state_id'       => $this->faker->numberBetween(1, 51),
            'zip'            => $this->faker->numberBetween(10000, 99999),
        ];

        $I = $this;
        $I->amOnPage('property/create');
        $I->submitForm('form#form-property-create', $minimumAttributesProperty);
        $I->see("Property Successfully Added");
        $I->seeRecord('properties', $minimumAttributesProperty);

        return $I->grabFromDatabase('properties', 'id', $minimumAttributesProperty);
    }

    /**
     * @param $propertyId
     *
     * @return array
     */
    public function grabLatestRentalEstimateId($propertyId)
    {
        $I                 = $this;
        $rentalEstimateIds = $I->grabColumnFromDatabase('rental_estimates', 'id', ['property_id' => $propertyId]);

        // First element should be latest element added from grabColumnFromDatabase
        return $rentalEstimateIds[0];
    }
}
