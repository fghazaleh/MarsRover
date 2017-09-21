<?php
declare(strict_types=1);

namespace FGhazaleh\Commands;

use FGhazaleh\Location\Coordinate;
/**
 * @package: FGhazaleh\Commands
 * @interface : CommandInterface
 * */
interface CommandInterface
{
    /**
     * @param string $command
     * @return bool ;
     */
    public function isValidCommand($command):bool ;

    /**
     * @param Coordinate $coordinate
     * @return Coordinate ;
     */
    public function updateCoordinate(Coordinate $coordinate):Coordinate;
}