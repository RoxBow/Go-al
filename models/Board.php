<?php

class Board {

    protected $cases;
    protected $position;

    public function __construct( $nbCases ){
        $this->cases = $nbCases;
        $this->position = [];
    }

    public function createBoard( $cases ){

        $letters = null;
        $numbers = null;

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

                $pawnDatas['tempColor'] = 0;
                $pawnDatas['tempLibertyDegree'] = 4;
                
                $this->position[$i][$j] = $pawnDatas;

                $board .= '<td> <span class="pion"></span> </td>';                
            }
            $board .= '</tr>';
        }

        $board .= '</table>';

        echo $board;
    }

    public function addPositionPion ( Stone $pion ){
        $pawnDatas = [];
       
        $color = $pion->__get('color');
        $libertyDegree = $pion->__get('libertyDegree');
        
        $pawnDatas['tempColor'] = $color;
        $pawnDatas['tempLibertyDegree']= $libertyDegree;

        // add 1 to respect board number
        $posX = $pion->__get('positionX');
        $posY = $pion->__get('positionY');

        $this->position[$posX][$posY] = $pawnDatas;
    }

    public function updateBoard($newBoard){
        
        $table = '<table id="game-board" class="ok">';
        
        foreach($newBoard as $rowKey => $row) {
            
            $table .= '<tr>';

            foreach($row as $cellKey => $cell) {
                
                if( ($rowKey != 0) )
                {
                    if ($cellKey != 0){

                        if ($rowKey != 8) {
                        
                            if ($cellKey != 8){

                                if( $newBoard[$rowKey][$cellKey-1]['tempColor'] !=0 ){
                                    $dl = $cell['tempLibertyDegree'];
                                    if( $dl != null){
                                        $dl --;
                                        $cell['tempLibertyDegree'] = $dl;
                                
                                    }
                                    
                                }
                                if( $newBoard[$rowKey][$cellKey+1]['tempColor'] !=0 ){
                                    $dl = $cell['tempLibertyDegree'];
                                    if( $dl != null){
                                        $dl --;
                                        $cell['tempLibertyDegree'] = $dl;
                                    }
                                    
                                }
                                if( $newBoard[$rowKey-1][$cellKey]['tempColor'] !=0 ){
                                    $dl = $cell['tempLibertyDegree'];
                                    if( $dl != null){
                                        $dl --;
                                        $cell['tempLibertyDegree'] = $dl;
                                    }
                                    
                                }
                                if( $newBoard[$rowKey+1][$cellKey]['tempColor'] !=0 ){
                                    $dl = $cell['tempLibertyDegree'];
                                    if( $dl != null){
                                        $dl --;
                                        $cell['tempLibertyDegree'] = $dl;
                                    }
                                    
                                }

                                

                            }

                        }

                    }
                }

                if ( $cell['tempLibertyDegree'] == 0 ) {
                    if( $cell['tempColor'] != null ){
                        $cell['tempColor'] = 0;
                    }
                }
                
                if($cell['tempColor'] === 1){
                    $table .= ('<td> <span class="pion noir"></span> </td>');
                } else if($cell['tempColor'] === 2){
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