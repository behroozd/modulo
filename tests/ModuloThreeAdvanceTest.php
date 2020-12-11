<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class ModuloThreeAdvanceExerciseTest extends TestCase{
	//--------------------------------------------------
	public function testStateInitialization(){
		$moduloThree = new ModuloThreeAE('11010');
        $this->assertEquals( "0", $moduloThree->getStateValue(State::S0) );
        $this->assertEquals( "1", $moduloThree->getStateValue(State::S1) );
        $this->assertEquals( "2", $moduloThree->getStateValue(State::S2) );
	}
	//--------------------------------------------------
	public function testTransitionInitialization(){
		$moduloThree = new ModuloThreeAE('100111');
        $this->assertEquals( State::S0, $moduloThree->getTransition(State::S0, InputAlphabet::ZERO) );
		$this->assertEquals( State::S1, $moduloThree->getTransition(State::S0, InputAlphabet::ONE ) );
		
        $this->assertEquals( State::S2, $moduloThree->getTransition(State::S1, InputAlphabet::ZERO) );
		$this->assertEquals( State::S0, $moduloThree->getTransition(State::S1, InputAlphabet::ONE ) );
		
        $this->assertEquals( State::S1, $moduloThree->getTransition(State::S2, InputAlphabet::ZERO) );
        $this->assertEquals( State::S2, $moduloThree->getTransition(State::S2, InputAlphabet::ONE ) );

	}
	//--------------------------------------------------
	public function testInvalidInput(){
        $this->expectException(\Exception::class);
		$moduloThree = new ModuloThreeAE('110a0');
	}
	//--------------------------------------------------
	public function testResult(){
        $input = '11001';
		$moduloThree = new ModuloThreeAE($input);
        $this->assertEquals(
            bindec($input) % 3,
            $moduloThree->answer()
        );
	}
	//--------------------------------------------------
}
