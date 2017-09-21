<?php


class MoveForwardCommandTest extends PHPUnit_Framework_TestCase
{
    private $c;

    public function setUp()
    {
        $this->c = new \FGhazaleh\Commands\MoveForwardCommand();
    }
    /**
     * @test
     * */
    public function validate_move_forward_command(){
        $this->assertTrue($this->c->isValidCommand('M'));
        $this->assertFalse($this->c->isValidCommand('L'));
    }
    /**
     * @test
     * */
    public function update_position_move_y_pos(){
        $p = new \FGhazaleh\Location\Coordinate(0,0,'N');
        $this->assertSame('0 1 N', (string)$this->c->updateCoordinate($p));
    }
    /**
     * @test
     * */
    public function update_position_move_x_pos(){
        $p = new \FGhazaleh\Location\Coordinate(0,0,'E');
        $this->assertSame('1 0 E', (string)$this->c->updateCoordinate($p));
    }
}