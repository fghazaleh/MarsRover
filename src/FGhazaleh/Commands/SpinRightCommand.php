<?php

namespace FGhazaleh\Commands;


use FGhazaleh\Location\Position;

class SpinRightCommand implements CommandInterface
{

    /**
     * @param string $command
     * @return bool ;
     */
    public function isValidCommand($command):bool
    {
        return ($command === 'R');
    }

    /**
     * @param Position $position
     * @return Position ;
     */
    public function updatePosition(Position $position):Position
    {
        $newDirection = $position->getDirection();
        switch($position->getDirection()){
            case 'N': // +90d
                $newDirection = Position::DIR_EAST;
                break;
            case 'S': // +90d
                $newDirection = Position::DIR_WEST;
                break;
            case 'E': // +90d
                $newDirection = Position::DIR_SOUTH;
                break;
            case 'W': // +90d
                $newDirection = Position::DIR_NORTH;
                break;
        }
        return new Position(
            $position->getPosX(),
            $position->getPosY(),
            $newDirection
        );
    }
}