<?php


class SpinLeftCommandTest extends PHPUnit_Framework_TestCase
{

    private $c;

    public function setUp()
    {
        $this->c = new \FGhazaleh\Commands\SpinLeftCommand();
    }
    /**
     * @test
     * */
    public function validate_spin_left_command(){

        $this->assertTrue($this->c->isValidCommand('L'));
        $this->assertFalse($this->c->isValidCommand('R'));
    }
    /**
     * @test
     * */
    public function update_position_move_W_pos(){
        $p = new \FGhazaleh\Location\Position(0,0,'N');
        $this->assertSame('0 0 W', (string)$this->c->updatePosition($p));
    }
    /**
     * @test
     * */
    public function update_position_move_E_pos(){
        $p = new \FGhazaleh\Location\Position(0,0,'S');
        $this->assertSame('0 0 E', (string)$this->c->updatePosition($p));
    }

}