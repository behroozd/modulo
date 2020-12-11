<?php
declare(strict_types = 1);

final class FiniteSetofStates{
	//--------------------------------------------------
    protected $states;
    protected $transitions;
    protected $currentState;
	//--------------------------------------------------
    public function __construct(){ $this->states = []; }
	//--------------------------------------------------
    public function init(){ $this->currentState = null; }
	//--------------------------------------------------
    public function addState(State $state){ $this->states[$state->getName()] = $state; }
	//--------------------------------------------------
    public function addTransition($stateA, $input, $stateB) {
        if (!isset($this->transitions[$stateA])){
            $this->transitions[$stateA] = [];
        }
        $this->transitions[$stateA][$input] = $stateB;
    }
	//--------------------------------------------------
    public function getStateValue($name){
		if(!isset($this->states[$name])){ throw new Exception("invalid state"); }
		return $this->states[$name]->getValue();
        
    }
	//--------------------------------------------------
    public function getTransition($name, $input){
		if(!isset($this->transitions[$name][$input])){ throw new Exception("invalid transitions"); }
		return $this->transitions[$name][$input];
        
    }
	//--------------------------------------------------
    public function changeState($input){
		$stateName = ($this->currentState==null) ?State::S0 :$this->currentState->getName();
		$this->currentState = $this->getState( $this->transitions[$stateName][$input] );
	}
	//--------------------------------------------------
    public function getState($stateName){
		return $this->states[$stateName]; }
	//--------------------------------------------------
    public function getCurrentState():State{ return $this->currentState; }
	//--------------------------------------------------
}