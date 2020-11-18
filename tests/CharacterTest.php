<?php
use PHPUnit\Framework\TestCase;
use App\Character;
use App\Gameplay;

class CharacterTest extends TestCase
{
    private $_name;

    private $_health;

    private $_strength;

    private $_defense;

    private $_speed;

    private $_luck;

    private $_player;

    public function setUp()
    {
        $this->_name = "Beast";
        $this->_health = 55;
        $this->_strength = 33;
        $this->_defense = 22;
        $this->_speed = 88;
        $this->_luck = 33;

        $this->_player = new Character($this->_name, $this->_health, $this->_strength, $this->_defense, $this->_speed, $this->_luck);
    }

    public function testSetAttributes()
    {
        $this->assertEquals($this->_name, $this->_player->getName());
        $this->assertEquals($this->_health, $this->_player->getHealth());
        $this->assertEquals($this->_defense, $this->_player->getDefence());
        $this->assertEquals($this->_speed, $this->_player->getSpeed());
        $this->assertEquals($this->_luck, $this->_player->getLuck());
    }

    public function testCharacterGetsDamage() {
        $this->_player->damage(50);
        $this->assertEquals($this->_player->getHealth(), 27);
    }

    public function testCharacterLuckiness() {
        $this->_player->setLuck(100);
        $this->assertTrue($this->_player->doYouFeelLuckyPunk());

        $this->_player->setLuck(0);
        $this->assertFalse($this->_player->doYouFeelLuckyPunk());
    }
}