<?php

spl_autoload_register(function($class) {
    include './models/' . $class . '.php';
});

session_start();

if( isset($_POST["currentTr"]) && isset($_POST["currentTd"]) ){
    

    $currentPlayer = $_SESSION['game']->currentPlayer;
    $newPosX = intval($_POST["currentTr"]);
    $newPosY = intval($_POST["currentTd"]);

    $_SESSION['game']->board->addStone($currentPlayer, $newPosX, $newPosY);
    $_SESSION['game']->updateTurn();
    $_SESSION['game']->updatePointPlayers($_SESSION['game']->board->lastColorDelete);
    
    $pointPlayer1 = $_SESSION['game']->Player1->point;
    $pointPlayer2 = $_SESSION['game']->Player2->point;
    $newBoard = $_SESSION['game']->board->boardPosition;
    $turn = $_SESSION['game']->turn;

    echo json_encode(
        array(
            'table' => $newBoard, 
            'player1' =>  $pointPlayer1,
            'player2' =>  $pointPlayer2,
            'turn' => $turn
        )
    );

} else if( isset($_POST["boardSize"]) && isset($_POST["player1"]) && isset($_POST["player2"]) ){
    /*
     * Player 1 is white
     * Player 2 is black
    */
    $player1 = new Player($_POST["player1"], 2);
    $player2 = new Player($_POST["player2"], 1);
    $firstBoard = new Board($_POST["boardSize"]);

    $_SESSION['game'] = new Game($firstBoard, $player1, $player2);
    $boardSize = $_SESSION['game']->init();

    /* 
     * Start of game 
     * Init board & send name players 
    */
    echo json_encode(
        array(
            'board'=> $boardSize,
            'player1' => $player1->__get("name"),
            'player2' => $player2->__get("name")
        )
    );
} else if(isset($_POST["kill"])){
    session_destroy();
}
