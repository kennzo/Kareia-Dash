Feature: Initial login and Register
  In order to test that login works properly
  As a user
  I want to be able to login successfully or register successfully

  Scenario: Initial login
    Given I am on the homepage
    When I follow "Login"
    Then I should be on "login"
    When I fill in "email" with "kenneth.sok@gmail.com"
      And I fill in "password" with "secret"
      And I press "Login"
    Then I should be on "home"

    # Need to add logic to clear out database (or use a test database) It's currently not doing so...
  Scenario: Initial successful registration
    Given I am on the homepage
    When I follow "Register"
    Then I should be on "register"
    When I fill in "name" with "Johnny"
      And I fill in "email" with "john@newEmail.com"
      And I fill in "password" with "secret"
      And I fill in "password_confirmation" with "secret"
      And I press "Register"
      And I wait for 1 second
    Then I should be on "home"