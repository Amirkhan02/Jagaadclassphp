<?php

class person {
    private string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }
    
        public function getName(): string {
            return $this->name;
        }

}
$lucas = new Person('Lucas');
$hammed = new Person('Hammed');

/*
echo $lucas->getName();
echo PHP_EOL;
echo $hammed->getName();

*/

class Airplane {
    private person $pilot;

    public function __construct(person $pilot) {
        $this->pilot = $pilot;
    }
    
        public function pilotName(): string {
            return $this->pilot->getName;
        }
}

$plane = new Airplane($lucas);
echo $plane->pilotName();