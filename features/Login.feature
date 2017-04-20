Feature: Initial login
  In order to test that login works properly
  As a user
  I want to be able to login successfully or register successfully

  Scenario: Initial login
    Given I am on the homepage
    When I follow "Login"
    Then I should be on "login"
