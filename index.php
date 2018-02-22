<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Go game</title>

    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <h1>Jeu de go</h1>

    <div class="wrapper-players">
        <div class="wrapper-tour">
            <p id="turn"></p>
        </div>
        <div class="wrapper-players-info">
            <div class="wrapper-player-1">
                <h2 class="joueur1 actif">Joueur 1</h2>
                <p id="score1" class="score">0</p>
            </div>
            <img src="./public/images/versus.png" alt="versus" class="versus">
            <div class="wrapper-player-2">
                <h2 class="joueur2">Joueur 2</h2>
                <p id="score2" class="score">0</p>
            </div>
        </div>
    </div>

    <div class="wrapper-goban"></div>
    <button class="kill">Reset GAME</button>

    <script src="public/js/jquery-3.3.1.min.js"></script>
    <script src="public/js/script.js"></script>
</body>
</html>