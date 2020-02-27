<?php

namespace App;

class RapidStrike extends Skill{

    protected $_isDefensive = false;

    protected $_isOffensive = true;

    protected $_luck = 10;

    protected $_increaseDamage = 100;

    protected $_name = 'Rapid Strike';

    public function applySkill($name, $damage){
        if (rand(1,100) < $this->_luck){
            echo $name . ' uses his ' . $this->_name . ' and does double damage' . PHP_EOL;
            return $damage + ($damage * $this->_increaseDamage / 100);
        }
        return $damage;
    }
}