<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class ModuloThreeStandardExerciseTest extends TestCase{
	//--------------------------------------------------
	public function testInvalidInput():void{
        $input = '110a1';
		$moduloThree = new ModuloThreeSE();
        $this->expectException(\Exception::class);
		$moduloThree->init($input);
    }
	//--------------------------------------------------
	public function testResult(){
        $input = '110101';
		$moduloThree = new ModuloThreeSE();
		$moduloThree->init($input);
        $this->assertEquals(
            bindec($input) % 3,
            $moduloThree->answer()
        );
	}
	//--------------------------------------------------
}
