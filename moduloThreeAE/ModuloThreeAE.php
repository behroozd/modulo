<?php
declare(strict_types = 1);

final class ModuloThreeAE{
	//--------------------------------------------------
    private $input;
    private $finiteSetofStates;
	//--------------------------------------------------
    public function __construct($input){
        $this->finiteSetofStates = new FiniteSetofStates;
		$this->init($input);
	}
	//--------------------------------------------------
    private function init($input){
        $this->finiteSetofStates->addState(new State(State::S0, 0));
        $this->finiteSetofStates->addState(new State(State::S1, 1));
        $this->finiteSetofStates->addState(new State(State::S2, 2));
		
        $this->finiteSetofStates->addTransition(State::S0, InputAlphabet::ONE, State::S1);
        $this->finiteSetofStates->addTransition(State::S1, InputAlphabet::ONE, State::S0);
        $this->finiteSetofStates->addTransition(State::S2, InputAlphabet::ONE, State::S2);

		$this->finiteSetofStates->addTransition(State::S0, InputAlphabet::ZERO, State::S0);
        $this->finiteSetofStates->addTransition(State::S1, InputAlphabet::ZERO, State::S2);
        $this->finiteSetofStates->addTransition(State::S2, InputAlphabet::ZERO, State::S1);
		
		$this->finiteSetofStates->init();

		$this->input = $input;
		$this->isValid();
	}
	//--------------------------------------------------
	private function isValid(){
        foreach(str_split($this->input) as $tmp){
			if($tmp!=InputAlphabet::ONE && $tmp!=InputAlphabet::ZERO){ throw new Exception("invalid input value"); }
        }
		return true;
	}
	//--------------------------------------------------
    public function getStateValue($name){ return $this->finiteSetofStates->getStateValue($name); }
	//--------------------------------------------------
    public function getTransition($name, $input){ return $this->finiteSetofStates->getTransition($name, $input); }
	//--------------------------------------------------
	public function answer(){
		$this->start();
        return $this->finiteSetofStates->getCurrentState()->getValue();
	}
	//--------------------------------------------------
    private function start(){
        foreach (str_split($this->input) as $tmp){
            $this->finiteSetofStates->changeState($tmp);
        }
    }
	//--------------------------------------------------
}