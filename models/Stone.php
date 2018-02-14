<?php

class Stone {

  protected $color;
  protected $libertyDegree;
  protected $position = [];

    public function __construct($positionX, $positionY){
        $this->position[] = array( 'x'=> $positionX, 'y'=> $positionY );
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