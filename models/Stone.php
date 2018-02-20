<?php

class Stone {

  protected $libertyDegree = 4;

    public function __construct($color, $positionX, $positionY){
        $this->color = $color;
        $this->positionX = $positionX;
        $this->positionY = $positionY;
    }

    public function __get($attrName){
        try {
            return $this->$attrName;
        } catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
    }

}