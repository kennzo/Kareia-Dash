<?php


class RentalEstimateCest
{
    protected $minimumRentalEstimateAttributes;
    protected $fullRentalEstimateAttributes;

    public function _before(FunctionalTester $I)
    {
        $this->minimumRentalEstimateAttributes = [
            'property_id'    => 4,
            'name'           => 'Non Admin Example Name',
            'purchase_price' => 100000,
            'rental_arv'     => 1000,
        ];
    }

    // CREATE - fail with no parameters filled
    public function tryToCreateRentalEstimate(FunctionalTester $I)
    {
        $I->login('non.admin@example.com', 'secret');
        $I->amOnPage('rentalEstimate/create');
        $I->submitForm('#form-rental-estimate-create', []);

        // Assertions
        $I->see("The property id field is required.");
        $I->see("The name field is required.");
        $I->see("The purchase price field is required.");
        $I->see("The rental arv field is required.");
    }

    // CREATE - fail b/c you put in bad values
    public function failToCreatePropertyWithBadValues(FunctionalTester $I)
    {
        $badRentalEstimateAttributes = [
            'property_id'             => 'abc',
            'name'                    => 123,
            'description'             => true,
            'arv'                     => 'abc',
            'purchase_price'          => 'abc',
            'repairs'                 => 'abc',
            'financed'                => 'abc',
            'total_loan_amount'       => 'abc',
            'interest_rate'           => 'abc',
            'term'                    => 'abc',
            'rental_arv'              => 'abc',
            'other_income'            => 'abc',
            'annual_taxes'            => 'abc',
            'insurance'               => 'abc',
            'hoa_term'                => 'abc',
            'hoa'                     => 'abc',
            'use_property_management' => 'abc',
            'property_management_fee' => 'abc',
            'capital_expenditures'    => 'abc',
            'vacancy'                 => 'abc',
            'monthly_repairs'         => 'abc',
        ];

        $I->login('non.admin@example.com', 'secret');
        $I->amOnPage('rentalEstimate/create');
        $I->submitForm('#form-rental-estimate-create', $badRentalEstimateAttributes);

        // Assertions
        $I->see('The property id must be an integer.');
        $I->see('The arv must be a number.');
        $I->see('The purchase price must be a number.');
        $I->see('The repairs must be a number.');
        $I->see('The financed field must be true or false.');
        $I->see('The total loan amount must be a number.');
        $I->see('The interest rate must be a number.');
        $I->see('The term must be an integer.');
        $I->see('The rental arv must be a number.');
        $I->see('The other income must be a number.');
        $I->see('The annual taxes must be a number.');
        $I->see('The insurance must be a number.');
        $I->see('The selected hoa term is invalid.');
        $I->see('The hoa must be a number.');
        $I->see('The use property management field must be true or false.');
        $I->see('The property management fee must be a number.');
        $I->see('The capital expenditures must be a number.');
        $I->see('The vacancy must be a number.');
        $I->see('The monthly repairs must be a number.');
    }

    // Success - CRUD with minimum requirements for brand new property
    public function successfullyCreatePropertyWithMinimumReqs(FunctionalTester $I)
    {
//        $I->login('non.admin@example.com', 'secret');
//        $I->amOnPage('rentalEstimate/create');
//        $propertyId = $this->minimumRentalEstimateAttributes['property_id'];

        $I->createNewUserAndLogin();
        $propertyId = $I->createPropertyForUser();
        $I->click('Back to All Properties');
        $I->amOnPage('rentalEstimate/create');
        $this->minimumRentalEstimateAttributes['property_id'] = $propertyId;

        // Create rental estimate
        $I->submitForm('#form-rental-estimate-create', $this->minimumRentalEstimateAttributes);
        $I->seeCurrentUrlMatches("/\/property\/$propertyId/");

        /**
         * Read
         *
         * Only one estimate available here. The rental estimate view is available but hidden until you
         * click on the link. Would need Javascript to test out the different tabs in acceptance tests.
         */
        $I->see('Estimate successfully added!');
        $I->see('Non Admin Example Name');
        $I->seeInField('purchase_price', '100000.00');
        $I->seeInField('rental_arv', '1000.00');

        // Update
        $I->fillField('other_income', 200);
        $latestRentalEstimateId = $I->grabLatestRentalEstimateId($propertyId);
        $I->click("input#save-estimate-$latestRentalEstimateId");
        $I->see('Rental Estimate updated!');
        $I->seeInField('other_income', '200.00');

        // Delete (not implemented yet)
    }

    // Success - Create with all field
    public function successfullyCreatePropertyWithAllFields(FunctionalTester $I)
    {
        $fullRentalEstimateAttributes = array_merge($this->minimumRentalEstimateAttributes, [
            'description'             => 'Sample description',
            'arv'                     => 100000,
            'repairs'                 => 10000,
            'financed'                => true,
            'total_loan_amount'       => 70000,
            'interest_rate'           => 5,
            'term'                    => 120,
            'other_income'            => 0,
            'annual_taxes'            => 2500,
            'insurance'               => 1500,
            'hoa_term'                => 'annual',
            'hoa'                     => 300,
            'use_property_management' => true,
            'property_management_fee' => '100',
            'capital_expenditures'    => 150,
            'vacancy'                 => 50,
            'monthly_repairs'         => 100,
        ]);

        $propertyId = $this->minimumRentalEstimateAttributes['property_id'];
        $I->login('non.admin@example.com', 'secret');
        $I->amOnPage('rentalEstimate/create');
        $I->submitForm('#form-rental-estimate-create', $fullRentalEstimateAttributes);

        $I->see('Estimate successfully added!');
        $I->see('Non Admin Example Name');
        $I->seeCurrentUrlMatches("/\/property\/$propertyId/");
    }
}
