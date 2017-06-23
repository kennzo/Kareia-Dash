Feature: CRUD test cases for property entity

  Background:
    Given

  Scenario: Successfully create, read, update, and delete a property to an account.
    Given I am on "login"
      And I fill in "email" with "kenneth.sok@gmail.com"
      And I fill in "password" with "secret"
    When I press "Login"
    Then I should be on "home"
      And I am on "properties"
    # Create a property
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
      And I press "Add Property"
    Then I should see "Property successfully added!"
    # Read a property
    When I am on "properties"
    Then I should see "789 2nd St., Houston, Texas"
    When I follow "789 2nd St., Houston, Texas"
    Then I should see "Property Address:"