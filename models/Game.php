<?php

class Game {
    
    private $time = 0;
    private $turn = 0;
    private $Player1;
    private $Player2;

    public function __construct(Player $Player1, Player $Player2) {
        $this->Player1 = $Player1;
        $this->Player2 = $Player2;
    }

    public function incrementTurn(){
        $this->turn++;
    }
}
