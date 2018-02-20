<?php

class Stone {

  protected $libertyDegree;
  protected $positionX;
  protected $positionY;
  protected $color;

    public function __construct($color, $positionX, $positionY){
        $this->color = $color;
        $this->positionX = $positionX;
        $this->positionY = $positionY;
        $this->libertyDegree = 4;
    }

    public function updateLibertyDegree(){
        
    }

    public function __get($attrName){
        try {
            return $this->$attrName;
        } catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
    }

}