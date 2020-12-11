<?php
declare(strict_types = 1);

final class ModuloThreeSE{
	//--------------------------------------------------
	private $value;
    private $stateMachine;
	private $currentChar;
	private $inputArray;
	private $status;
	//--------------------------------------------------
    public function __construct(){
	}
	//--------------------------------------------------
    public function init($input){
		//----------------------------------------------
		$this->value  = null;
		//----------------------------------------------
		if($input==""){ throw new \Exception('invalid input value.'); }
		//----------------------------------------------
		$tmps = str_split($input);
		foreach($tmps as $tmp){
			if($tmp!='0' && $tmp!='1'){ throw new \Exception('invalid input value.'); }
		}
		//----------------------------------------------
		$this->value        = bindec($input);
		//----------------------------------------------
		$this->stateMachine = "0";
		$this->currentChar  = null;
		$this->inputArray = str_split($input);
		//----------------------------------------------
		$this->status = "Init";
		//----------------------------------------------
    }
	//--------------------------------------------------
	public function answer(){
		$this->start();
		return $this->stateMachine;
	}
	//--------------------------------------------------

	//--------------------------------------------------
	private function start(){
		$this->status = "Start";
		foreach($this->inputArray as $tmp){
			$this->currentChar = $tmp;
			$this->state();
		}
		$this->status = "Completed";
	}
	//--------------------------------------------------
	private function state(){
		if( $this->stateMachine=='0' ){
			$this->stateMachine = ($this->currentChar=='0') ? 0 : 1;
			return;
		}
		if( $this->stateMachine=='1' ){
			$this->stateMachine = ($this->currentChar=='0') ? 2 : 0;
			return;
		}
		if( $this->stateMachine=='2' ){
			$this->stateMachine = ($this->currentChar=='0') ? 1 : 2;
			return;
		}
	}
	//--------------------------------------------------
}
