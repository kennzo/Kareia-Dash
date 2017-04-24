Feature: As a user,
  In order to see properties
  I'd like to see my own, those shared with me, and not others.

  Scenario: Accessing a property that belongs to user.
    Given I am logged in and at the dashboard
    When I am on "/property/4"
    Then I should see "5421 Smith Dr."

  Scenario: Accessing a property that belongs to user.
    Given I am logged in and at the dashboard
    When I am on "/property/1"
    Then I should be on "/properties"
