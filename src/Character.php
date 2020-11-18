<?php

namespace App;

class Character
{
    private $_health;

    private $_strength;

    private $_defence;

    private $_speed;

    private $_luck;

    private $_name;

    private $_skills=[];

    public function __construct($name, $health, $strength, $defence, $speed, $luck) {

        $this->_speed = $speed;

        $this->_health = $health;

        $this->_defence = $defence;

        $this->_strength = $strength;
        
        $this->_luck = $luck;

        $this->_name = $name;
    }

    public function getSpeed() {
        return $this->_speed;
    }

    public function getHealth() {
        return $this->_health;
    }

    public function getName() {
        return $this->_name;
    }

    public function getDefence() {
        return $this->_defence;
    }

    public function getLuck() {
        return $this->_luck;
    }

    public function setLuck($luck) {
        $this->_luck = $luck;
    }

    public function addSkill($skill) {
        return $this->_skills[] = $skill;
    }

    public function atack() {
        $damage = $this->_strength;
        
        //check defence skills
        foreach($this->_skills as $skill){
            if($skill->isOffensive())
                $damage = $skill->applySkill($this->getName(), $damage);
        }
        return $damage;
    }

    public function damage($atack) {
        $damage = $atack - $this->_defence;

        //check defence skills
        foreach($this->_skills as $skill){
            if($skill->isDefensive())
                $damage = $skill->applySkill($this->getName(), $damage);
        }

        echo $this->getName() . ' suffers a blow and looses ' . $damage . ' health' . PHP_EOL;
        $this->_health = $this->_health - $damage < 0 ? 0: $this->_health - $damage;
    }

    public function stats() {
        echo 'Stats: ' . 'Name: ' . $this->_name . '; Speed: ' . $this->_speed . '; Health: ' . $this->_health . 
        ' Strength: ' . $this->_strength . ' Defence: ' . $this->_defence . ' Luck: ' . $this->_luck . PHP_EOL;
    }

    public function healthStats() {
        echo $this->_name . ' Health Stats: ' . ' Health: ' . $this->_health . PHP_EOL;
    }

    public function doYouFeelLuckyPunk(): bool
    {
        return rand(1, 100) < $this->_luck;
    }
}