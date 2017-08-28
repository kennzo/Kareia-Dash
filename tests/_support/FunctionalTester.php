<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class FunctionalTester extends \Codeception\Actor
{
    use _generated\FunctionalTesterActions;

   /**
    * Define custom actions here
    */

    /**
     * Login as user.
     *
     * @param $name
     * @param $password
     */
    public function login($name, $password)
    {
        $I = $this;
        $I->amOnPage('/login');
        $I->submitForm('form', [
            'email' => $name,
            'password' => $password
        ]);
        $I->see("You are logged in!");
    }
}
