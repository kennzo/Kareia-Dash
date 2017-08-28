<?php

/**
 * Testing CRUD for properties
 *
 * Class PropertyCest
 */
class PropertyCest
{
    protected $minimumAttributesProperty;
    protected $fullAttributesProperty;
    protected $badAttributesProperty;

    public function _before(FunctionalTester $I)
    {
        $this->minimumAttributesProperty = [
            'street_address' => '123 Mainer St.',
            'city' => 'Houston',
            'state_id' => 43,
            'zip' => '77002',
        ];

        $this->fullAttributesProperty = array_merge(
            $this->minimumAttributesProperty,
            [
                'bedrooms' => 3,
                'bathrooms' => 2,
                'garages' => 2,
                'year_built' => 1990,
                'living_square_footage' => 2000,
                'lot_square_footage' => 5000,
                'neighborhood' => 'Test Neighborhood',
            ]
        );

        $this->badAttributesProperty = [
            'street_address' => '123 Mainer St.',
            'city' => 'Houston',
            'state_id' => 'bad data',
            'zip' => 'bad data',
            'bedrooms' => 'bad data',
            'bathrooms' => 'bad data',
            'garages' => 'bad data',
            'year_built' => 'bad data',
            'living_square_footage' => 'bad data',
            'lot_square_footage' => 'bad data',
        ];

        $I->login('kenneth.sok@gmail.com', 'secret');
        $I->amOnPage('property/create');
    }

    public function _after(FunctionalTester $I)
    {
    }

    // CREATE with minimum fields filled
    public function tryToCreatePropertyWithMinimalRequirements(FunctionalTester $I)
    {
        $I->submitForm('form#form-property-create', $this->minimumAttributesProperty);
        $I->see("Property Successfully Added");
        $I->seeCurrentUrlMatches('/property\/[1-9]*[0-9]*/');
        $I->seeRecord('properties', $this->minimumAttributesProperty);
    }

    // CREATE with all fields filled out
    public function tryToCreatePropertyWithAllAttributes(FunctionalTester $I)
    {
        $I->submitForm('form#form-property-create', $this->fullAttributesProperty);
        $I->see("Property Successfully Added");
        $I->seeCurrentUrlMatches('/property\/[1-9]*[0-9]*/');
        $I->seeRecord('properties', $this->fullAttributesProperty);
    }

    // CREATE and fail with empty submit
    public function failToCreatePropertyWithEmptyData(FunctionalTester $I)
    {
        $I->submitForm('form#form-property-create', []);
        $I->see('The street address field is required.');
        $I->see('The city field is required.');
        $I->see('The state id field is required.');
        $I->see('The zip field is required.');
    }

    public function failToCreatePropertyWithBadData(FunctionalTester $I)
    {
        $I->submitForm('form#form-property-create', $this->badAttributesProperty);
        $I->see('The state id must be an integer.');
        $I->see('The bedrooms must be an integer.');
        $I->see('The bathrooms must be a number.');
        $I->see('The garages must be an integer.');
        $I->see('The year built must be an integer.');
        $I->see('The living square footage must be an integer.');
        $I->see('The lot square footage must be an integer.');
    }
}
