<?php
declare(strict_types=1);

namespace FGhazaleh\Commands;

use FGhazaleh\Location\Coordinate;

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
     * @param Coordinate $c
     * @return Coordinate;
     */
    public function updateCoordinate(Coordinate $c):Coordinate
    {
        $newPosX = $c->getPosX();
        $newPosY = $c->getPosY();
        switch($c->getDirection()){
            case 'N': //Move up
                $newPosY = $c->getPosY()+1;
                break;
            case 'S': //Move down
                $newPosY = $c->getPosY()-1;
                break;
            case 'E': //Move right
                $newPosX = $c->getPosX()+1;
                break;
            case 'W': //Move left
                $newPosX = $c->getPosX()-1;
                break;
        }
        return new Coordinate(
            $newPosX,
            $newPosY,
            $c->getDirection()
        );
    }
}