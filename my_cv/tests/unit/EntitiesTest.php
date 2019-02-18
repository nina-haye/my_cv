<?php namespace App\Tests;

use App\Entity\Formation;
use App\Entity\Experience;
use App\Entity\Loisir;
use App\Entity\Skill;

class EntitiesTest extends \Codeception\Test\Unit
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
    public function testExperience()
    {
        $experience = new Experience();
        $experience->setEntreprise('TrucMachin');
        $this->assertEquals('TrucMachin', $experience->getEntreprise());
        
        $experience->setPoste('Bidule');
        $this->assertEquals('Bidule', $experience->getPoste());
        
        $experience->setDateDebut(new \DateTime('2000-01-01 00:00:00'));
        $this->assertEquals(new \DateTime('2000-01-01 00:00:00'), $experience->getDateDebut());
        
        $experience->setDateFin(new \DateTime('2000-01-06 00:00:00'));
        $this->assertEquals(new \DateTime('2000-01-06 00:00:00'), $experience->getDateFin());
        
        $experience->setLieu('Ici');
        $this->assertEquals('Ici', $experience->getLieu());
    }
    
    public function testFormation()
    {
        $formation = new Formation();
        $formation->setName('nomnom');
        $this->assertEquals('nomnom', $formation->getName());
        
        $formation->setDateDebut(new \DateTime('2012-11-01 00:00:00'));
        $this->assertEquals(new \DateTime('2012-11-01 00:00:00'), $formation->getDateDebut());
        
        $formation->setDateFin(new \DateTime('2012-11-21 00:00:00'));
        $this->assertEquals(new \DateTime('2012-11-21 00:00:00'), $formation->getDateFin());
        
        $formation->setLieu('labas');
        $this->assertEquals('labas', $formation->getLieu());
    }
    
    public function testLoisir()
    {
        $loisir = new Loisir();
        $loisir->setName('monmon');
        $this->assertEquals('monmon', $loisir->getName());
        
        $loisir->setComment('comcom');
        $this->assertEquals('comcom', $loisir->getComment());
    }
    
    public function testSkill()
    {
        $skill = new Skill();
        $skill->setName('otpgenji');
        $this->assertEquals('otpgenji', $skill->getName());
    }
}