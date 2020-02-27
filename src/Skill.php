<?php

namespace App;

abstract class Skill
{
    abstract public function applySkill($name, $damage);

    public function isDefensive(){
        return $this->_isDefensive;
    }

    public function isOffensive(){
        return $this->_isOffensive;
    }

    public function setLuck($luck){
        $this->_luck = $luck;
    }
}