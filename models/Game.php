<?php

class Game {

    const BLACK = 1;
    const WHITE = 2;
    const NOSTONE = 0;
    
    private $turn = 0;
    private $Player1;
    private $Player2;
    protected $currentPlayer;
    private $board;

    public function __construct(Board $board, Player $player1, Player $player2) {
        $this->Player1 = $player1;
        $this->Player2 = $player2;
        $this->board = $board;

        // Player start is black (rule)
        $this->currentPlayer = Game::BLACK;
    }

    public function init(){
        $firstBoard = $this->board->generateBoard();
        
        return $firstBoard;
    }

    public function updateTurn(){

        // Altern turn players
        if($this->currentPlayer === Game::BLACK){
            $this->turn++;
            $this->currentPlayer = Game::WHITE;
        } else if($this->currentPlayer === Game::WHITE){
            $this->currentPlayer = Game::BLACK;
        }
    }

    public function updatePointPlayers($colorDelete){

        if($colorDelete === Game::BLACK){
            $this->Player2->incrementPoint();
        } else if($colorDelete === Game::WHITE){
            $this->Player1->incrementPoint();
        }
    }

    public function __get($property){
        try {
            return $this->$property;
        } catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
    }

    public function __set($property, $value) {
        $this->$property = $value;
    }


}
