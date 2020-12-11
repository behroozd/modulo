<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class StatesTest extends TestCase{
	//--------------------------------------------------
	public function testNewState(){
		$state = new State(State::S0, 0);
        $this->assertEquals( State::S0, $state->getName() );
        $this->assertEquals( 0        , $state->getValue() );
		$state = new State(State::S1, 1);
        $this->assertEquals( State::S1, $state->getName() );
        $this->assertEquals( 1        , $state->getValue() );
		$state = new State(State::S2, 2);
        $this->assertEquals( State::S2, $state->getName() );
        $this->assertEquals( 2        , $state->getValue() );
	}
	//--------------------------------------------------
}