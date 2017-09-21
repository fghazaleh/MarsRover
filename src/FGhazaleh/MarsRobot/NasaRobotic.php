<?php

namespace FGhazaleh\MarsRobot;


use FGhazaleh\Commands\CommandInterface;
use FGhazaleh\Location\Position;
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
     * @var Position
     */
    private $position;
    /**
     * @param array $instructions ;
     * @param Position $position
     */
    function __construct(array $instructions,Position $position){
        $this->setPosition($position);
        $this->setInstructions($instructions);
    }
    /**
     * @param Position $position
     * @return NasaRobotic
     * */
    public function setPosition(Position $position):NasaRobotic
    {
        $this->position = $position;
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
                    $this->position = $command->updatePosition($this->position);
                }
            }
        }
        return $this;
    }
    /**
     * @return Position;
     * */
    public function getPosition():Position
    {
        return $this->position;
    }
}