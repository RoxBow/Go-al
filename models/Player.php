<?php

class Player {
    
    protected $name;
    protected $point = 0;

    public function __construct($name) {
        $this->name = $name;
    }

    public function incrementPoint(){
        $this->point += 1;
    }

    public function __get($property){
        try {
            return $this->$property;
        } catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
    }

    public function __set($property, $value) {
        $this->$property = $value;
    }
}
