<?php

class Board {

    protected $cases;

    public function __construct( $nbCases ){
        $this->cases = $nbCases;
        $this->createBoard( $this->cases );
    }
    

    public function createBoard( $cases ){
        for ($a=0; $a < 2; $a++) { 
            echo '<ul class="repere-lettres">';
                for($i=0; $i < $cases; $i++) {
                    echo '<li>&#0'.($i+65).'</li>';
                }
            echo '</ul>';
        }

        for ($b=0; $b<2; $b++) { 
            echo '<ul class="repere-chiffres">';
                for($i=0; $i < $cases; $i++) {
                    echo '<li>'.($i+1).'</li>';
                }
            echo '</ul>';            
        }
        

        echo '<table id="game-board">';
        
        for($i=0; $i < $cases; $i++) {
            echo '<tr>';
            for($j=0; $j < $cases; $j++) { 
                echo    '<td>
                            <span class="pion"></span>
                        </td>';                
            }
            echo '</tr>';
        }

        echo '</table>';
    }

    public function __get($attrName){
    if(in_array($attrName, $this->fields)){
        return $this->$attrName;
    } else{
        die('get illegal field: '.$attrName);
    }
    }

    public function __set($attrName, $attrValue){ 
    if(in_array($attrName, $this->fields)){
        $this ->$attrName = $attrValue;
    } else{
        die('set illegal field: '.$attrName);
    }
    }
}