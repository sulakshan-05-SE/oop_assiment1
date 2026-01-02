<?php

// BASE CLASS: Vehicle
class Vehicle
{
    // Public properties can be accessed directly (though typically we prefer protected/private)
    public $make;
    public $model;

    // Encapsulation: $speed is protected. 
    protected $speed;

    // Constructor to initialize the object
    public function __construct($make, $model)
    {
        // Using $this to refer to the current object's properties
        $this->make = $make;
        $this->model = $model;
        $this->speed = 0; // Default speed
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function setSpeed($speed)
    {
        if ($speed < 0) {
            echo "Error: Speed cannot be negative.<br>";
        } else {
            // Using $this to assign the new value to the property
            $this->speed = $speed;
        }
    }

    
    public function describe()
    {
        return "This is a {$this->make} {$this->model} moving at {$this->speed} km/h.";
    }

    
    public function startEngine()
    {
        return "Engine started generically.";
    }
}

// SUBCLASS: Car
// Inheritance: Car inherits properties and methods from Vehicle.
class Car extends Vehicle
{
    private $hasSunroof;

    public function __construct($make, $model, $hasSunroof = false)
    {
        // Call the parent constructor to ensure base properties are set up
        parent::__construct($make, $model);
        $this->hasSunroof = $hasSunroof;
    }

    
    public function startEngine()
    {
        return "Car engine started with a push button!";
    }

    
    public function describe()
    {
        // Using parent::describe() to get the base description
        $baseDescription = parent::describe();

        $sunroofStatus = $this->hasSunroof ? "It has a sunroof." : "It does not have a sunroof.";

        // Extending the result
        return $baseDescription . " " . $sunroofStatus;
    }
}



$myCar = new Car("Toyota", "Camry", true);


// We cannot do $myCar->speed = 50; because speed is protected.

$myCar->setSpeed(60);

echo "<p><strong>Description:</strong> " . $myCar->describe() . "</p>";

// Simple Overriding
// Calling startEngine(), which is completely replaced in Car.
echo " " . $myCar->startEngine() . "</p>";

// 5. Accessing public properties inherited from Vehicle
echo " Make: {$myCar->make}, Model: {$myCar->model}</p>";

?>