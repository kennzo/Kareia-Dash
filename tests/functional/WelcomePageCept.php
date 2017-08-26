<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('view the welcome page');

$I->amOnPage('/');
$I->seeResponseCodeIs(200);
$I->see('Kareia-Dash');
$I->see('login');