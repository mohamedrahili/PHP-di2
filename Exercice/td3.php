<?php
class Vehicule {
    private $brand;
    protected $model;
    public $color;
    public $price;

    public function __construct($brand, $model, $color, $price) {
        $this->brand = $brand;
        $this->model = $model;
        $this->color = $color;
        $this->price = $price;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function getModel() {
        return $this->model;
    }

    public function getColor() {
        return $this->color;
    }

    public function getPrice() {
        return $this->price;
    }

    public function startEngine() {
        echo "The engine of  " . $this->brand . " " . $this->model . " is turn on !";
    }

    public function stopEngine() {
        return " The engine of" . $this->brand . " " . $this->model . " is turn off.";
    }
}
$vehicle = new Vehicule("Ferrari", "812", "Red", 100000);

echo $vehicle->getBrand() . "<br>";   
echo $vehicle->getModel() . "<br>";   
echo $vehicle->getColor() . "<br>";   
echo $vehicle->getPrice() . "<br>";

echo $vehicle->startEngine() . "<br>";
echo $vehicle->stopEngine() . "<br>";
?>