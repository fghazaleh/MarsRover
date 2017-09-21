<?php
require_once 'bootstrap.php';

use FGhazaleh\Location\Position;
use FGhazaleh\MarsRobot\NasaRobotic;
use FGhazaleh\Commands\SpinLeftCommand;
use FGhazaleh\Commands\SpinRightCommand;
use FGhazaleh\Commands\MoveForwardCommand;


/* ------------[Testing]--------- */

$input1 = '3 3 E';
$input2 = 'LMLMLMLMM';


list($x,$y,$d) = explode(' ',$input1);
$instructions = str_split($input2);


$position = new Position($x,$y,$d);  // <=== defined position coordinates.

$robotic = new NasaRobotic($instructions,$position); // <=== create NasaRobotic instance

$robotic->addCommand(new MoveForwardCommand()) // <=== Add pre-defined commands.
        ->addCommand(new SpinLeftCommand())
        ->addCommand(new SpinRightCommand());

$robotic->exec(); // <==== Execute the provided instructions.

echo $robotic->getPosition(); // <==== Get the last updated position after exec the instructions.
echo PHP_EOL;