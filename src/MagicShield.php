<?php

namespace App;

class MagicShield extends Skill{
    protected $_isDefensive = true;

    protected $_isOffensive = false;

    protected $_luck = 20;

    protected $_reduceDamage = 50;

    protected $_name = 'Magic Shield';

    public function applySkill($name, $damage){
        if (rand(1,100) < $this->_luck){
            echo $name . ' uses his ' . $this->_name . ' and instead of losing ' . $damage . ' only loses ' . round($damage/2) . PHP_EOL;
            return round($damage/2);
        }
        return $damage;
    }
}