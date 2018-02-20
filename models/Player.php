<?php

class Player {
    
    protected $name;
    protected $point;

    public function __construct($name) {
        $this->name = $name;
        $this->point = 0;
    }

    public function incrementPoint($point){
        $this->point += $point;
    }

    public function decrementPoint($point){
        $this->point -= $point;
    }
}
