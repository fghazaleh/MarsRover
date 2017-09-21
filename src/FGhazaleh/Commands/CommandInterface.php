<?php

namespace FGhazaleh\Commands;

use FGhazaleh\Location\Position;
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
     * @param Position $position
     * @return Position ;
     */
    public function updatePosition(Position $position):Position;
}