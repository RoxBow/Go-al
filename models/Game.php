<?php

class Game {
    
    private $time = 0;
    private $turn = 0;
    private $Player1;
    private $Player2;
    
    public function __construct(Player $Player1, Player $Player2) {
        $this->Player1 = $Player1;
        $this->Player2 = $Player2;

        // 1 = black | 2 = white
        // player start is black
        $this->currentPlayer = 1;
    }

    public function incrementTurn(){
        $this->turn++;
    }

    public function changePlayerTurn(){

        if($this->currentPlayer === 1){
            $this->currentPlayer = 2;
        } else if($this->currentPlayer === 2) {
            $this->currentPlayer = 1;
        }
    }

    public function __get($attrName){
        try {
            return $this->$attrName;
        } catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
    }

}
