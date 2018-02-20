<?php

class Board {

    protected $cases;
    protected $position;

    public function __construct( $nbCases ){
        $this->cases = $nbCases;
        $this->position = [];
    }

    public function createBoard( $cases ){


        for ($a = 0; $a < 2; $a++) { 
            $letters .= '<ul class="repere-lettres">';
                for($i = 0; $i < $cases; $i++) {
                    $letters .= '<li>&#0'.($i+65).'</li>';
                }
            $letters .= '</ul>';
        }

        echo $letters;


        for ($b = 0; $b < 2; $b++) { 
            $numbers .= '<ul class="repere-chiffres">';
                for($i = 0; $i < $cases; $i++) {
                    $numbers .= '<li>'.($i+1).'</li>';
                }
            $numbers .= '</ul>';            
        }

        echo $numbers;

        /* # BOARD # */


        $board = '<table id="game-board">';
        
        for($i = 0; $i < $cases; $i++) {
            $board .= '<tr>';
            for($j=0; $j < $cases; $j++) { 
                $this->position[$i][$j] = 0;

                $board .= '<td> <span class="pion"></span> </td>';                
            }
            $board .= '</tr>';
        }

        $board .= '</table>';

        echo $board;
    }

    public function addPositionPion ( Stone $pion ){
        $value = $pion->__get('color');
        // add 1 to respect board number
        $posX = $pion->__get('positionX');
        $posY = $pion->__get('positionY');

        $this->position[$posX][$posY] = $value;
    }

    public function updateBoard($newBoard){
        
        $table = '<table id="game-board" class="ok">';
        
        foreach($newBoard as $row) {
            $table .= '<tr>';

            foreach($row as $cell) {
                if($cell === 1){
                    $table .= ('<td> <span class="pion noir"></span> </td>');
                } else if($cell === 2){
                    $table .= ('<td> <span class="pion blanc"></span> </td>');
                } else {
                    $table .= ('<td> <span class="pion"></span> </td>');
                }
              
            }

            $table .= '</tr>';
        }
        $table .= '</table>';

        return $table;
    }

    public function __get($attrName){
        try {
            return $this->$attrName;
        } catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
    }

}