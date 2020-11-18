<?php

namespace App;

class SkillFactory
{
    public function createSkill(String $skill){
        if (strtolower($skill) == 'magicshield')
            return new MagicShield();

        if (strtolower($skill) == 'rapidstrike')
            return new RapidStrike();
        
        return null;
    }
}