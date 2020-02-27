<?php
require dirname(__DIR__) . '/vendor/autoload.php';

$game = new \App\Gameplay(dirname(__DIR__) . '/config/config.json');
$game->createFighters();
$game->fight();