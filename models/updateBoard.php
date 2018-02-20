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

    if($_SESSION['currentBoard']['addPoint'] === 1){
        $_SESSION['player2']->incrementPoint(1);
    } else if($_SESSION['currentBoard']['addPoint'] === 2) {
        $_SESSION['player1']->incrementPoint(1);
    }

    $pointPlayer1 = $_SESSION['player1']->__get('point');
    $pointPlayer2 = $_SESSION['player2']->__get('point');
    $newBoard = $_SESSION['currentBoard']['table'];

    echo json_encode(array(
            'table' => $newBoard, 
            'player1' =>  $pointPlayer1,
            'player2' =>  $pointPlayer2
        )
    );

} else if( isset($_POST["player1"]) && isset($_POST["player2"]) ){

    $_SESSION['player1'] = new Player($_POST["player1"], 'white');
    $_SESSION['player2'] = new Player($_POST["player2"], 'black');
    $_SESSION['game'] = new Game($_SESSION['player1'], $_SESSION['player2']);
    $_SESSION['currentBoard'] = null;

    echo json_encode(array('player1' => $_POST["player1"], 'player2' => $_POST["player2"]));

}