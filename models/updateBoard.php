<?php

function __autoload($classname) {
    $filename = "./". $classname .".php";
    include_once($filename);
}

session_start();

if(isset($_POST["currentTr"]) && isset($_POST["currentTd"])){
    
    $currentPlayer = $_SESSION['game']->__get("currentPlayer");
    $posX = intval($_POST["currentTr"]);
    $posY = intval($_POST["currentTd"]);

    $_SESSION['board']->addPositionPion( new Stone($currentPlayer, $posX, $posY) );
    $_SESSION['game']->changePlayerTurn();
    $_SESSION['currentBoard'] = $_SESSION['board']->updateBoard($_SESSION['board']->__get("position"));

    echo $_SESSION['currentBoard'];
}