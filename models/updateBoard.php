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

} else if( isset($_POST["player1"]) && isset($_POST["player2"]) ){

    $_SESSION['player1'] = new Player($_POST["player1"], 'white');
    $_SESSION['player2'] = new Player($_POST["player2"], 'black');
    $_SESSION['game'] = new Game($_SESSION['player1'], $_SESSION['player2']);
    $_SESSION['currentBoard'] = null;

    echo json_encode(array('player1' => $_POST["player1"], 'player2' => $_POST["player2"]));

}