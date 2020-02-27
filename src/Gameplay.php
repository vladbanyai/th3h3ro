<?php

namespace App;

class Gameplay
{
    public $fighters;

    private $_gameOn = true;

    private $_config;

    public function __construct($config) {
        $this->_config = $config;
    }

    public function createFighters(){
        $config = file_get_contents($this->_config);
        $config = json_decode($config);
        $players = $config->players;
        
        foreach($players as $player){
            $health = rand($player->minHealth, $player->maxHealth);
            $strength = rand($player->minStrength, $player->maxStrength);
            $defense = rand($player->minDefense, $player->maxDefense);
            $speed = rand($player->minSpeed, $player->maxSpeed);
            $luck = rand($player->minLuck, $player->maxLuck);
            
            $character = new Character($player->name, $health, $strength, $defense, $speed, $luck);
            
            if(isset($player->skills) && $player->skills){
                foreach($player->skills as $skillClass){
                    var_dump($skillClass);
                    $skillClass = "\\App\\" . $skillClass;
                    $skill = new $skillClass;
                    
                    $character->addSkill($skill);
                }
            }
            
            $this->addFighter($character);
            

        }
    }

    public function addFighter(character $character){
        $this->fighters[] = $character;
    }

    public function fight() {
        $this->createFighters();
        echo "----------Fight Starts------------" . PHP_EOL;
        echo $this->fighters[0]->stats() . PHP_EOL;
        echo $this->fighters[1]->stats() . PHP_EOL;

        $this->setStartingPosition();
        
        $firstIteration = true;
        do{
            if($firstIteration){
                echo $this->fighters[0]->getName() . ' starts' . PHP_EOL . PHP_EOL;
                $firstIteration = false;
            }

            if(!$this->fighters[1]->doYouFeelLuckyPunk()){
                $damage = $this->fighters[0]->atack();
                $this->fighters[1]->damage($damage, $this->fighters[0]->getDefence());
            }
            else
                echo $this->fighters[0]->getName() . ' misses his punch' . PHP_EOL;
            echo $this->fighters[1]->healthStats();
            echo $this->fighters[0]->healthStats();
            $this->checkEndGame();
            $this->fighters = array_reverse($this->fighters);
        }
        while($this->_gameOn);
    }

    private function setStartingPosition() {
        $order = function($a, $b){
            if($a->getSpeed() == $b->getSpeed())
                return $a->getLuck() < $b->getLuck();
            return $a->getSpeed() < $b->getSpeed();
        };
        usort($this->fighters, $order);
    }

    private function checkEndGame() {
        foreach($this->fighters as $fighter)
            if($fighter->getHealth() == 0){
                echo $fighter->getName() . ' lost.' . PHP_EOL;
                $this->_gameOn = false;
            }
    }
}