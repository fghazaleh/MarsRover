<?php
declare(strict_types=1);

namespace FGhazaleh\Location;

class Coordinate
{
    const DIR_NORTH = 'N';
    const DIR_SOUTH = 'S';
    const DIR_WEST = 'W';
    const DIR_EAST = 'E';

    private $posX = 0;
    private $posY = 0;
    private $direction = 'N';

    private $acceptableDirection = [
        self::DIR_NORTH,self::DIR_SOUTH,self::DIR_WEST,self::DIR_EAST
    ];
    /**
     * @param int $x;
     * @param int $y;
     * @param string $direction;
     * */
    function __construct(int $x,int $y,string $direction){
        $this->setPosX($x);
        $this->setPosY($y);
        $this->setDirection($direction);
    }

    /**
     * @return int
     */
    public function getPosX():int
    {
        return $this->posX;
    }

    /**
     * @param int $posX
     */
    private function setPosX(int $posX)
    {
        $this->posX = $posX;
    }

    /**
     * @return int
     */
    public function getPosY():int
    {
        return $this->posY;
    }

    /**
     * @param int $posY
     */
    private function setPosY(int $posY)
    {
        $this->posY = $posY;
    }

    /**
     * @return string
     */
    public function getDirection():string
    {
        return $this->direction;
    }
    /**
     * @param null|string $direction
     * @throws \Exception
     */
    private function setDirection(string $direction)
    {
        if ( ! in_array($direction, $this->acceptableDirection) ){
            throw new \Exception(sprintf('The direction [%s] you provided is invalid',$direction));
        }
        $this->direction = $direction;
    }
    /**
     * @return string;
     * */
    function __toString():string
    {
        return "{$this->getPosX()} {$this->getPosY()} {$this->getDirection()}";
    }
}