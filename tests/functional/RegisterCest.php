<?php


class RegisterCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // Register a new member
    public function tryToRegister(FunctionalTester $I)
    {
        $I->amOnPage('/register');
        $I->see('Name');
        $I->fillField('name', 'Test User');
        $I->see('E-Mail Address');
        $I->fillField('email', 'test.user@example.com');
        $I->see('Password');
        $I->fillField('password', 'secret');
        $I->see('Confirm Password');
        $I->fillField('password_confirmation', 'secret');
        $I->click('Register', 'form');
        $I->canSeeInCurrentUrl('home');
        $I->see('You are logged in!');
        $I->see('Test User');
        $I->seeRecord("users", ['name' => 'Test User']);
    }

    public function registerWithExistingEmail(FunctionalTester $I)
    {
        $I->amOnPage('/register');
        $I->see('Name');
        $I->fillField('name', 'Test User');
        $I->see('E-Mail Address');
        $I->fillField('email', 'kenneth.sok@gmail.com');
        $I->see('Password');
        $I->fillField('password', 'secret');
        $I->see('Confirm Password');
        $I->fillField('password_confirmation', 'secret');
        $I->click('Register', 'form');
        $I->canSeeInCurrentUrl('register');
        $I->see('The email has already been taken.');
    }
}
