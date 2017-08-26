<?php


class LogOrRegisterCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // Login successfully
    public function tryToLogin(FunctionalTester $I)
    {
        $I->amOnPage('/login');
        $I->see("E-Mail Address");
        $I->fillField("email", "kenneth.sok@gmail.com");
        $I->see("Password");
        $I->fillField("password", "secret");
        $I->click("Login", "form");
        $I->see("You are logged in!");
    }

    // Test an unsuccessful login
    public function failToLogin(FunctionalTester $I)
    {
        $I->amOnPage('/login');
        $I->see("E-Mail Address");
        $I->fillField("email", "fake.user@example.com");
        $I->see("Password");
        $I->fillField("password", "fakerino");
        $I->click("Login", "form");
        $I->see("These credentials do not match our records.");
        $I->dontSee("You are logged in!");
    }

    // Test login for an admin
/*    public function tryToLoginAsAdmin(FunctionalTester $I)
    {

    }*/
}
