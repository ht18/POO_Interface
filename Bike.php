
<?php

require_once('Vehicle.php');
require_once "LightableInterface.php";


class Bicycle extends Vehicle implements LightableInterface
{
    public function __construct(string $color, int $nbSeats)
    {
        parent::__construct($color, $nbSeats);
        parent::setNbWheels(2);
    }

    public function switchOn(): bool
    {
        if ($this->getCurrentSpeed() > 10) return true;
        return false;
    }
    public function switchOff(): bool
    {
        return false;
    }
}
