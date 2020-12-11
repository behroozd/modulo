<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class FiniteSetofStatesTest extends TestCase{
	//--------------------------------------------------
	public function testAddState(){
		$finiteSetofStates = new FiniteSetofStates();
        $finiteSetofStates->addState(new State(State::S0, 0));

        $this->assertEquals( 0, $finiteSetofStates->getStateValue(State::S0) );
	}
	//--------------------------------------------------
	public function testAddTransition(){
		$finiteSetofStates = new FiniteSetofStates();
        $finiteSetofStates->addTransition(State::S0, InputAlphabet::ONE, State::S1);

        $this->assertEquals( State::S1, $finiteSetofStates->getTransition(State::S0, InputAlphabet::ONE) );
	}
	//--------------------------------------------------
	public function testChangeState(){
		$finiteSetofStates = new FiniteSetofStates();
        $finiteSetofStates->addState(new State(State::S0, 0));
        $finiteSetofStates->addState(new State(State::S1, 1));
        $finiteSetofStates->addState(new State(State::S2, 2));
		
        $finiteSetofStates->addTransition(State::S0, InputAlphabet::ONE, State::S1);
        $finiteSetofStates->addTransition(State::S1, InputAlphabet::ONE, State::S0);
        $finiteSetofStates->addTransition(State::S2, InputAlphabet::ONE, State::S2);

		$finiteSetofStates->addTransition(State::S0, InputAlphabet::ZERO, State::S0);
        $finiteSetofStates->addTransition(State::S1, InputAlphabet::ZERO, State::S2);
        $finiteSetofStates->addTransition(State::S2, InputAlphabet::ZERO, State::S1);
		
		$finiteSetofStates->init();
		
		$finiteSetofStates->changeState(InputAlphabet::ONE);
        $this->assertEquals( State::S1, $finiteSetofStates->getCurrentState()->getName() );
		$finiteSetofStates->changeState(InputAlphabet::ZERO);
        $this->assertEquals( State::S2, $finiteSetofStates->getCurrentState()->getName() );
		$finiteSetofStates->changeState(InputAlphabet::ZERO);
        $this->assertEquals( State::S1, $finiteSetofStates->getCurrentState()->getName() );
		$finiteSetofStates->changeState(InputAlphabet::ONE);
        $this->assertEquals( State::S0, $finiteSetofStates->getCurrentState()->getName() );
	}
	//--------------------------------------------------
}