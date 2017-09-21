<?php


class SpinRightCommandTest extends PHPUnit_Framework_TestCase
{

    private $c;

    public function setUp()
    {
        $this->c = new \FGhazaleh\Commands\SpinRightCommand();
    }
    /**
     * @test
     * */
    public function validate_spin_right_command(){
        $this->assertTrue($this->c->isValidCommand('R'));
        $this->assertFalse($this->c->isValidCommand('M'));
    }
    /**
     * @test
     * */
    public function update_position_move_E_pos(){
        $p = new \FGhazaleh\Location\Position(0,0,'N');
        $this->assertSame('0 0 E', (string)$this->c->updatePosition($p));
    }
    /**
     * @test
     * */
    public function update_position_move_w_pos(){
        $p = new \FGhazaleh\Location\Position(0,0,'S');
        $this->assertSame('0 0 W', (string)$this->c->updatePosition($p));
    }

}