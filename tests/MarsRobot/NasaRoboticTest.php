<?php

use FGhazaleh\Commands\MoveForwardCommand;
use FGhazaleh\Commands\SpinLeftCommand;
use FGhazaleh\Commands\SpinRightCommand;
use FGhazaleh\Location\Position;
use FGhazaleh\MarsRobot\NasaRobotic;

class NasaRoboticTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProviderForTestCases
     * @test
     * */
    public function test_NasaRobotic($x,$y,$dir,$cmd,$expected)
    {
        $p = new Position($x,$y,$dir);
        $i = str_split($cmd);
        $r = new NasaRobotic($i,$p);
        $r->addCommand(new MoveForwardCommand())
            ->addCommand(new SpinRightCommand())
            ->addCommand(new SpinLeftCommand());

        $this->assertSame($expected,(string)$r->exec()->getPosition());
    }

    /**
     * Used as data provider for test cases.
     * @return array
     * */
    public function dataProviderForTestCases()
    {
        return [
            [1,2,'N','LMLMLMLMM','1 3 N'],
            [3,3,'E','MMRMMRMRRM','5 1 E'],
        ];
    }
}