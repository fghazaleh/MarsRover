<?php
declare(strict_types=1);

namespace FGhazaleh\MarsRobot;

use FGhazaleh\Commands\CommandInterface;
use FGhazaleh\Location\Coordinate;
/**
 * @package: FGhazaleh\MarsRobot
 * @interface : NasaRobotic
 * */
class NasaRobotic
{
    /**
     * @var array;
     * */
    private $commands = [];
    /**
     * @var array
     * */
    private $instructions = [];
    /**
     * @var Coordinate
     */
    private $coordinate;
    /**
     * @param array $instructions ;
     * @param Coordinate $coordinate
     */
    function __construct(array $instructions, Coordinate $coordinate){
        $this->setCoordinate($coordinate);
        $this->setInstructions($instructions);
    }
    /**
     * @param Coordinate $coordinate
     * @return NasaRobotic
     * */
    public function setCoordinate(Coordinate $coordinate):NasaRobotic
    {
        $this->coordinate = $coordinate;
        return $this;
    }
    /**
     * @param CommandInterface $command
     * @return NasaRobotic;
     */
    public function addCommand(CommandInterface $command):NasaRobotic
    {
        array_push($this->commands,$command);
        return $this;
    }
    /**
     * @param array $instructions;
     * @return NasaRobotic;
     * */
    public function setInstructions(array $instructions):NasaRobotic
    {
        $this->instructions = $instructions;
        return $this;
    }
    /**
     * @return NasaRobotic;
     * */
    public function exec():NasaRobotic
    {
        /**
         * @var CommandInterface $command;
         * */
        foreach ($this->instructions as $instruction) {
            foreach($this->commands as $command){
                if ( $command->isValidCommand($instruction) ){
                    $this->coordinate = $command->updateCoordinate($this->coordinate);
                }
            }
        }
        return $this;
    }
    /**
     * @return Coordinate;
     * */
    public function getCoordinate():Coordinate
    {
        return $this->coordinate;
    }
}