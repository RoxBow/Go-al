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
            echo '<ul class="repere-lettres">';
                for($i = 0; $i < $cases; $i++) {
                    echo '<li>&#0'.($i+65).'</li>';
                }
            echo '</ul>';
        }

        for ($b = 0; $b < 2; $b++) { 
            echo '<ul class="repere-chiffres">';
                for($i = 0; $i < $cases; $i++) {
                    echo '<li>'.($i+1).'</li>';
                }
            echo '</ul>';            
        }

        /* # BOARD # */

        echo '<table id="game-board">';
        
        for($i = 0; $i < $cases; $i++) {
            echo '<tr>';
            for($j=0; $j < $cases; $j++) { 
                $this->position[$i][$j] = 0;

                echo '<td> <span class="pion"></span> </td>';                
            }
            echo '</tr>';
        }

        echo '</table>';
    }

    public function addPositionPion ( Stone $pion ){
        $value = $pion->__get('color');
        // add 1 to respect board number
        $posX = $pion->__get('positionX');
        $posY = $pion->__get('positionY');

        var_dump($pion);

        $posX += 1;
        $posY += 1;

        $this->position[$posX][$posY] = $value;
    }


    public function updateBoard($newBoard){
        
        $maTable = '<table id="game-board" class="ok">';
        
        foreach($newBoard as $row) {
            $maTable .= '<tr>';

            foreach($row as $cell) {
                if($cell['color'] === 0){
                    $maTable .= ('<td> <span class="pion noir"></span> </td>');
                } else {
                    $maTable .= ('<td> <span class="pion blanc"></span> </td>');
                }
              
            }

            $maTable .= '</tr>';
        }
        $maTable .= '</table>';

        return $maTable;
    }

    public function __get($attrName){
        try {
            return $this->$attrName;
        } catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
    }

}