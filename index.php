<?php 

require_once('models/Game.php');
require_once('models/Player.php');

$player1 = new Player('Elmar');
$player2 = new Player('Bendo');
$game = new Game($player1, $player2);

var_dump($game);
