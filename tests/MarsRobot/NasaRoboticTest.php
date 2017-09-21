<?php

use FGhazaleh\Commands\MoveForwardCommand;
use FGhazaleh\Commands\SpinLeftCommand;
use FGhazaleh\Commands\SpinRightCommand;
use FGhazaleh\Location\Coordinate;
use FGhazaleh\MarsRobot\NasaRobotic;

class NasaRoboticTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProviderForTestCases
     * @test
     * */
    public function test_NasaRobotic($x,$y,$dir,$cmd,$expected)
    {
        $p = new Coordinate($x,$y,$dir);
        $i = str_split($cmd);
        $r = new NasaRobotic($i,$p);
        $r->addCommand(new MoveForwardCommand())
            ->addCommand(new SpinRightCommand())
            ->addCommand(new SpinLeftCommand());

        $this->assertSame($expected,(string)$r->exec()->getCoordinate());
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