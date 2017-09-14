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

        $I->login('non.admin@example.com', 'secret');
        $I->amOnPage('rentalEstimate/create');
    }

    public function _after(FunctionalTester $I)
    {
    }

    // CREATE - fail with no parameters filled
    public function tryToCreateRentalEstimate(FunctionalTester $I)
    {
        $I->submitForm('#form-rental-estimate-create', []);
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

        $I->submitForm('#form-rental-estimate-create', $badRentalEstimateAttributes);
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

    // Success - Create with minimum requirements
    public function successfullyCreatePropertyWithMinimumReqs(FunctionalTester $I)
    {
        $propertyId = $this->minimumRentalEstimateAttributes['property_id'];
        $I->submitForm('#form-rental-estimate-create', $this->minimumRentalEstimateAttributes);
        $I->see('Estimate successfully added!');
        $I->see('Non Admin Example Name');
        $I->seeCurrentUrlMatches("/\/property\/$propertyId/");
    }

    // Success - Create with all fields
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
        $I->submitForm('#form-rental-estimate-create', $fullRentalEstimateAttributes);
        $I->see('Estimate successfully added!');
        $I->see('Non Admin Example Name');
        $I->seeCurrentUrlMatches("/\/property\/$propertyId/");
    }

    // Cannot create with wrong property ID. Users will not really be able to do this but putting
    // in test just in case.
    public function failCreatePropertyWithWrongPropertyId(FunctionalTester $I)
    {
        // Change property Id to be owned by admin
        $this->minimumRentalEstimateAttributes['property_id'] = 1;
        $I->submitForm('#form-rental-estimate-create', $this->minimumRentalEstimateAttributes);
        $I->dontSee('Estimate successfully added!');
        $I->dontSee('Non Admin Example Name');
    }
}
