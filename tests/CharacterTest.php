<?php
use PHPUnit\Framework\TestCase;
use App\Character;
use App\Gameplay;

class CharacterTest extends TestCase
{
    public function testSetAttributes()
    {
        $name = "Beast";
        $health = 55;
        $strength = 33;
        $defense = 22;
        $speed = 88;
        $luck = 33;

        $character = new Character($name, $health, $strength, $defense, $speed, $luck);

        $this->assertEquals($name, $character->getName());
        $this->assertEquals($health, $character->getHealth());
        $this->assertEquals($defense, $character->getDefence());
        $this->assertEquals($speed, $character->getSpeed());
        $this->assertEquals($luck, $character->getLuck());
    }
}