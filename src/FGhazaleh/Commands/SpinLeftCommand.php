<?php
declare(strict_types=1);

namespace FGhazaleh\Commands;

use FGhazaleh\Location\Coordinate;

class SpinLeftCommand implements CommandInterface
{

    /**
     * @param string $command
     * @return bool ;
     */
    public function isValidCommand($command):bool
    {
        return ($command === 'L');
    }

    /**
     * @param Coordinate $c
     * @return Coordinate ;
     */
    public function updateCoordinate(Coordinate $c):Coordinate
    {
        $newDirection = $c->getDirection();
        switch($c->getDirection()){
            case 'N': // -90d
                $newDirection = Coordinate::DIR_WEST;
                break;
            case 'S': // -90d
                $newDirection = Coordinate::DIR_EAST;
                break;
            case 'E': // -90d
                $newDirection = Coordinate::DIR_NORTH;
                break;
            case 'W': // -90d
                $newDirection = Coordinate::DIR_SOUTH;
                break;
        }
        return new Coordinate(
            $c->getPosX(),
            $c->getPosY(),
            $newDirection
        );
    }
}