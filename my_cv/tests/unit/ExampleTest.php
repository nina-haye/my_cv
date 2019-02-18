<?php namespace App\Tests;

class ExampleTest extends \Codeception\Test\Unit
{
    /**
     * @var \App\Tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $experience = new Experience();
        $experience->setEntreprise("TrucMachin");
        $this->assertEquals('TrucMachin', $experience->getEntreprise());
    }
}