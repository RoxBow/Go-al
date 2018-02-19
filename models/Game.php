<?php

class Game {
    
    private $time = 0;
    private $turn = 0;
    private $Player1;
    private $Player2;
    
    // 1 = white | 0 = black
    // player start is white

    public function __construct(Player $Player1, Player $Player2) {
        $this->Player1 = $Player1;
        $this->Player2 = $Player2;
        $this->currentPlayer = 1;
    }

    public function incrementTurn(){
        $this->turn++;
    }

    public function changePlayerTurn(){

        if($this->currentPlayer === 1){
            $this->currentPlayer = 0;
        } else if($this->currentPlayer === 0) {
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
