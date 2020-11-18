<?php
use PHPUnit\Framework\TestCase;
use App\Character;
use App\Gameplay;
use App\MagicShield;
use App\RapidStrike;

class GamePlayTest extends TestCase
{
    public function testGreaterSpeedStarts()
    {
        $player1 = new Character('Beast', 70, 30, 20, 20, 10);
        $player2 = new Character('Hero', 80, 40, 30, 15, 15);
        $game = new Gameplay('config.json');
        $game->addFighter($player1);
        $game->addFighter($player2);
        
        $game->fight();
        
        $this->expectOutputRegex('/Beast starts/');

    }

    public function testCertainLooser()
    {
        $player1 = new Character('Beast', 70, 1, 20, 1, 10);
        $player2 = new Character('Hero', 80, 40, 30, 15, 15);
        $game = new Gameplay('config.json');
        $game->addFighter($player1);
        $game->addFighter($player2);
        
        $game->fight();
        
        $this->expectOutputRegex('/Beast lost/');

    }

    public function testGameRunsMax()
    {
        $player1 = new Character('Beast', 2, 2, 2, 2, 2);
        $player2 = new Character('Hero', 2, 2, 2, 2, 2);
        $game = new Gameplay('config.json');
        $game->addFighter($player1);
        $game->addFighter($player2);
        
        $game->fight();
        
        $this->expectOutputRegex('/There is no winner this time/');

    }

    public function testMagicShield()
    {
        $player1 = new Character('Beast', 70, 40, 20, 20, 10);
        $player2 = new Character('Hero', 80, 40, 30, 15, 15);
        $skill = new MagicShield();
        $skill->setLuck(100);
        $player2->addSkill($skill);
        $game = new Gameplay('config.json');
        $game->addFighter($player1);
        $game->addFighter($player2);
        
        $game->fight();
        
        $this->expectOutputRegex('/Hero uses his Magic Shield and instead of losing 10 only loses 5/');

    }

    public function testRapidStrike()
    {
        $player1 = new Character('Beast', 70, 30, 20, 20, 10);
        $player2 = new Character('Hero', 80, 40, 30, 15, 15);
        $skill = new RapidStrike();
        $skill->setLuck(100);
        $player2->addSkill($skill);
        $game = new Gameplay('config.json');
        $game->addFighter($player1);
        $game->addFighter($player2);
        
        $game->fight();
        
        $this->expectOutputRegex('/Hero uses his Rapid Strike and does double damage/');

    }

}