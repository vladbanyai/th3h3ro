<?php

namespace App;

class MagicShield{
    private $_isDefensive = true;

    private $_isOffensive = false;

    private $_luck = 20;

    private $_reduceDamage = 50;

    private $_name = 'Magic Shield';

    public function applySkill($name, $damage){
        if (rand(1,100) < $this->_luck){
            echo $name . ' uses his ' . $this->_name . ' and instead of losing ' . $damage . ' only loses ' . round($damage/2) . PHP_EOL;
            return round($damage/2);
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