<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class FirstCest
{
    
    
    
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    }
    
    public function frontpageWorksTest(AcceptanceTester  $I)
    {
        $I->amOnPage('/');
        $I->see('Home');
    }
}
