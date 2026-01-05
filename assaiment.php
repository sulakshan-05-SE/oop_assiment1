<?php


class Vehicle {

    public $make;
    public $model;

    // Encapsulation: protected → child class access 
    protected $speed = 0;

    // Constructor
    public function __construct($make, $model, $speed = 0) {
        $this->make = $make;   
        $this->model = $model;
        $this->speed = $speed;
    }

    // Getter method (encapsulation)
    public function getSpeed() {
        return $this->speed;
    }

    // Setter method (encapsulation)
    public function setSpeed($speed) {
        if ($speed >= 0) {
            $this->speed = $speed;
        }
    }

    // Method to override later
    public function showDetails() {
        return "Vehicle: {$this->make} {$this->model}, Speed: {$this->speed} km/h";
    }
}




class Car extends Vehicle {

    // Simple overriding 
    public function showDetails() {

        // parent::showDetails() 
        $parentOutput = parent::showDetails();

        // parent output-(extended overriding)
        return $parentOutput . " | Type: Car";
    }

    // Overriding (without parent::) → Fully Replace Example
    public function startCar() {
        return "Car Started!"; 
    }
}


$car = new Car("Toyota", "Corolla", 60);

// Encapsulation → safe access
$car->setSpeed(80);

echo $car->showDetails(); 
echo "<br>";
echo $car->startCar();

?>
