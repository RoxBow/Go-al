<?php 

require_once('models/Game.php');
require_once('models/Player.php');
require_once('models/Board.php');

$player1 = new Player('Elmar');
$player2 = new Player('Bendo');
$game = new Game($player1, $player2);



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jeu de go</title>

    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <h1>Jeu de go</h1>
    <div class="wrapper-game">
        <div class="wrapper-goban">
            <?php
                $board = new Board(9);
            ?>
        </div>

        <div class="wrapper-players">
            <div class="wrapper-player-1">
                <h2 class="joueur1 actif">Joueur 1</h2>
                <p class="score">0</p>
            </div>
            <div class="wrapper-player-2">
                <h2 class="joueur2">Joueur 2</h2>
                <p class="score">0</p>
            </div>
        </div>
    </div>
    
    <script src="public/js/jquery-3.3.1.min.js"></script>
    <script src="public/js/script.js"></script>
</body>
</html>