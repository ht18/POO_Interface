<?php

require_once "Vehicle.php";
require_once "LightableInterface.php";

class Car extends Vehicle implements LightableInterface
{
    private string $energy;
    private int $energylevel;
    private bool $hasParkBrake;

    public const ALLOWED_ENERGIES = [
        'fuel',
        'electric',
    ];


    public function __construct(string $color, int $nbSeats, string $energy)
    {
        parent::__construct($color, $nbSeats);
        parent::setNbWheels(4);
        $this->energy = $energy;
    }

    public function getEnergy(): string
    {
        return $this->energy;
    }

    public function getEnergyLevel(): int
    {
        return $this->energylevel;
    }

    public function setEnergy(string $energy): Car
    {
        if (in_array($energy, self::ALLOWED_ENERGIES)) {
            $this->energy = $energy;
        }
        return $this;
    }

    public function setParkBrake(int $hasParkBrake): void
    {

        $this->hasParkBrake = $hasParkBrake;
    }

    public function start(): void
    {
        if (isset($this->hasParkBrake))
            echo $this->hasParkBrake;
        else throw new Exception('Variable non définie');
    }
    public function switchOn(): bool
    {
        return true;
    }
    public function switchOff(): bool
    {
        return false;
    }
}

$car = new Car('white', 5, 'yes');
$car->setParkBrake(true);

try {
    $car->start();
} catch (Exception $e) {
    echo 'Exception received  : ' . $e->getMessage() . PHP_EOL;
    $car->setParkBrake(true);
} finally {
    echo "Ma voiture roule comme un donut" . PHP_EOL;
}
