<?php

namespace App;

class RapidStrike{
    private $_isDefensive = false;

    private $_isOffensive = true;

    private $_luck = 10;

    private $_increaseDamage = 100;

    private $_name = 'Rapid Strike';

    public function applySkill($name, $damage){
        if (rand(1,100) < $this->_luck){
            echo $name . ' uses his ' . $this->_name . ' and does double damage' . PHP_EOL;
            return $damage + ($damage * $this->_increaseDamage / 100);
        }
        return $damage;
    }

    public function isDefensive(){
        return $this->_isDefensive;
    }

    public function isOffensive(){
        return $this->_isOffensive;
    }
}