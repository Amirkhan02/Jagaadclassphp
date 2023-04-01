<?php

abstract class Engine{
    abstract public function turnOn();
}
class SubaruEngine extends Engine{
    public function turnOn() {
        echo 'This is a subaru engine';
    }
}
class VolvoEngine extends Engine{
    public function turnOn() {
        echo 'This is a volvo engine';
    }
}

class car {
    private Engine $engine;
    public function __construct(Engine $engine) {
        $this->engine = $engine;

    }
    public function turnOn(){
        $this->engine->turnOn();
    }
}

$subaru = new Car(new SubaruEngine);
$subaru->turnOn();

echo PHP_EOL;

$volvo = new Car(new VolvoEngine);
$volvo->turnOn();