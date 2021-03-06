Feature: I can add a property successfully and without error.

  Scenario: Successfully add a property to an account.
    Given I am logged in and at the dashboard
      And I am on "properties"
      And I follow "Create Property"
    When I fill in "street_address" with "789 2nd St."
      And I fill in "city" with "Houston"
      And I select "Texas" from "state_id"
      And I fill in "zip" with "77002"
      And I fill in "bedrooms" with "3"
      And I fill in "bathrooms" with "2"
      And I fill in "garages" with "2"
      And I fill in "year_built" with "1990"
      And I fill in "living_square_footage" with "2000"
      And I fill in "lot_square_footage" with "5000"
      And I fill in "neighborhood" with "Smallville"
      And I press "Create"
    Then I should be on "properties"
      And I should see "Property successfully added!"

  Scenario: Successfully add a property to an account with minimum fields.
    Given I am logged in and at the dashboard
      And I am on "properties"
      And I follow "Create Property"
    When I fill in "street_address" with "789 2nd St."
      And I fill in "city" with "Houston"
      And I select "Texas" from "state_id"
      And I fill in "zip" with "77002"
      And I press "Create"
    Then I should be on "properties"
      And I should see "Property successfully added!"

  Scenario: Unsuccessfully add a property to an account with no fields.
    Given I am logged in and at the dashboard
      And I am on "properties"
      And I follow "Create Property"
    When I press "Create"
    Then I should be on "properties/create"
      And I should see "The street address field is required."
      And I should see "The city field is required."
      And I should see "The state id field is required."
      And I should see "The zip field is required."

  Scenario: Unsuccessfully add a property to an account with bad values.
    Given I am logged in and at the dashboard
      And I am on "properties"
      And I follow "Create Property"
    When I fill in "street_address" with "123 Fake St."
      And I fill in "city" with "Houston"
      And I select "Texas" from "state_id"
      And I fill in "zip" with "77002"
      And I fill in "bedrooms" with "abc"
      And I fill in "bathrooms" with "def"
      And I fill in "garages" with "ghi"
      And I fill in "year_built" with "abcd"
      And I fill in "living_square_footage" with "efgh"
      And I fill in "lot_square_footage" with "ijkl"
      And I fill in "neighborhood" with "Abcdefghij"
      And I press "Create"
    Then I should be on "properties/create"
      And I should see "The bedrooms must be an integer."
      And I should see "The bathrooms must be a number."
      And I should see "The garages must be an integer."
      And I should see "The year built must be an integer."
      And I should see "The living square footage must be an integer."
      And I should see "The lot square footage must be an integer."
