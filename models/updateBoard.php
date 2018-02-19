<?php

require_once('./Player.php');
require_once('./Game.php');
require_once('./Board.php');
require_once('./Stone.php');

session_start();

if(isset($_POST["currentTr"]) && isset($_POST["currentTd"])){
    $_SESSION['board']->addPositionPion( new Stone(0, intval($_POST["currentTd"]), intval($_POST["currentTr"])) );
    $_SESSION['game']->changePlayerTurn();
    $_SESSION['currentBoard'] = $_SESSION['board']->updateBoard($_SESSION['board']->__get("position"));

    echo $_SESSION['currentBoard'];
}