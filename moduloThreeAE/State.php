<?php
class State{
	//--------------------------------------------------
    const S0 = 'S0';
    const S1 = 'S1';
    const S2 = 'S2';
	//--------------------------------------------------
    private $name;
    private $value;
	//--------------------------------------------------
    public function __construct($name, $value){
        $this->name  = $name;
        $this->value = $value;
    }
	//--------------------------------------------------
    public function getName(){ return $this->name; }
	//--------------------------------------------------
    public function getValue(){ return $this->value; }
	//--------------------------------------------------
}