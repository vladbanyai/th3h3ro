<?php
require dirname(__DIR__) . '/vendor/autoload.php';

//$hero = new \App\Character('Orderus');
//$monster = new \App\Character('Monster');

$game = new \App\Gameplay(dirname(__DIR__) . '/config/config.json');
//$game->addFighter($hero);
//$game->addFighter($monster);

$game->fight();