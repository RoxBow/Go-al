<?php

class Board {

    protected $cases;

    public function __construct( int $nbCases ){
        $this->cases = $nbCases;
        createBoard( $this->cases );
    }
    

    public function createBoard( $cases ){
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