<?php
//namespace Tests\feature;
//use PHPUnit\Framework\TestCase;
//use Tests\TestCase;
namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use robotCombat;


class Test extends TestCase
{
    public function testToString()
    {
        $robot = new Robot("testD2");
        $this->assertEquals("Robot testD2", $robot->__toString());
    }

    public function testFire()
    {
        $robot1 = new Robot("R2D2");
        $robot2 = new Robot("C3PO");

        $robot1->fire($robot2);
        $this->assertEquals(8, $robot2->getHealth());
        
    }

    public function testArenaFight()
    {
        $robot1 = new Robot("R2D2");
        $robot2 = new Robot("C3PO");

        $arena = new Arena();
        $winner = $arena->fight($robot1, $robot2);

        $this->assertTrue($winner->isDead());
    }
}



?>