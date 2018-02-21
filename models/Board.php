<?php

class Board {

    const BLACK = 1;
    const WHITE = 2;
    const NOSTONE = 0;

    private $boardPosition;
    private $nbrCases;

    /* 
     * Will get the color piece remove from board 
     * To update point players
     */  
    private $lastColorDelete = null;
    
    public function __construct($nbrCases){
        $this->boardPosition = [];
        $this->nbrCases = $nbrCases;
    }
    
    public function generateBoard(){
        $nbrCases = $this->nbrCases;

        for($i = 0; $i < $nbrCases; $i++){
            for($j= 0; $j < $nbrCases; $j++){
                
                // Each case of board is init to 0 for empty
                $stone['colorStone'] = Board::NOSTONE;
                $this->boardPosition[$i][$j] = $stone['colorStone'];
            }
        }

        return $this->boardPosition;
    }

    public function addStone($color, $x, $y) {
        // If case is empty
        if ($this->boardPosition[$x][$y] === Board::NOSTONE) {
            $this->boardPosition[$x][$y] = $color;
            $this->resolve();
        }
    }

    private function resolve() {
        foreach ($this->boardPosition as $x => $row) {
            foreach($row as $y => $square) {
                // if case has piece
                if ($square > 0) $this->resolveSquare($x,$y);
            }
        }
    }

    private function resolveSquare($x,$y) {

        $checks = array(
            array($x-1,$y),
            array($x+1,$y),
            array($x,$y-1),
            array($x,$y+1)
        );

        $color = $this->boardPosition[$x][$y];
        $ennemyColor = $color === Board::BLACK ? Board::WHITE : Board::BLACK;
        
        // Reset liberty degree
        $surrounding = 0;

        
        foreach($checks as $check) {
            if ($check[0] < 0 || $check[1] < 0 ||
                $check[0] >= $this->nbrCases || $check[1] >= $this->nbrCases ||
                $this->boardPosition[$check[0]][$check[1]] === $ennemyColor ) {
                    $surrounding++;
                }
        }

        if ($surrounding === 4){
            // Save last color delete
            $this->lastColorDelete = $this->boardPosition[$x][$y];
            $this->boardPosition[$x][$y] = Board::NOSTONE;
        }
    }

    public function __get($property){
        try {
            return $this->$property;
        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }

    public function __set($property, $value) {
        $this->$property = $value;
    }

}