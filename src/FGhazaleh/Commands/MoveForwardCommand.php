<?php

namespace FGhazaleh\Commands;


use FGhazaleh\Location\Position;

class MoveForwardCommand implements CommandInterface
{
    /**
     * @param string $command
     * @return bool ;
     */
    public function isValidCommand($command):bool
    {
        return ($command === 'M');
    }

    /**
     * @param Position $position
     * @return Position ;
     */
    public function updatePosition(Position $position):Position
    {
        $newPosX = $position->getPosX();
        $newPosY = $position->getPosY();
        switch($position->getDirection()){
            case 'N': //Move up
                $newPosY = $position->getPosY()+1;
                break;
            case 'S': //Move down
                $newPosY = $position->getPosY()-1;
                break;
            case 'E': //Move right
                $newPosX = $position->getPosX()+1;
                break;
            case 'W': //Move left
                $newPosX = $position->getPosX()-1;
                break;
        }
        return new Position(
            $newPosX,
            $newPosY,
            $position->getDirection()
        );
    }
}