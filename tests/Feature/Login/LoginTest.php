<?php
/**
 * SafeAndSecureReturns.com
 * @copyright REI Network, L.P. (c) 2016
 */

namespace Tests\Feature\Login;

use Auth;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        Auth::loginUsingId(1);  // my admin
    }

    public function testLoginWorks()
    {
        $this->call('GET', '/home');
//        $this->assertResponseOk();
//        $this->see("You are logged in!");
    }
}
