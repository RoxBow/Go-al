<?php

class Player {
    
    protected $name;
    protected $point = 0;

    public function __construct($name) {
        $this->name = $name;
    }

    public function incrementPoint($point){
        $this->point += $point;
    }
}
