<?php

class Player {
    
    protected $name;
    protected $point;
    protected $color;

    public function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
        $this->point = 0;
    }

    public function incrementPoint($point){
        $this->point += $point;
    }

    public function __get($attrName){
        try {
            return $this->$attrName;
        } catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
    }
}
