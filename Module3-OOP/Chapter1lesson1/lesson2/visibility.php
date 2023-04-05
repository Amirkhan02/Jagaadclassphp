<?php
/*
class Fruit3 {
    public $name;
    protected $color;
    private $weight;

    public function __construct($weight)
    {
        $this->weight = $weight;
    }

    public function getWeight() {
        return $this->weight;
    }
}

$mango = new Fruit3('100');

echo $mango->getWeight();

$mango->name = 'Mango'; //ok
$mango->color = 'Yellow'; //error
$mango->weight = '300'; //error

*/


class Fruit3 {
    public $name;
    protected $color;
    private $weight;

    public function __construct($weight)
    {
        $this->setWeight($weight);
    }

    private function setWeight($weight) {
       $this->weight = $weight . PHP_EOL;
    }

    public function getWeight() {
        return $this->weight;
    }
}

$mango = new Fruit3('100');

echo $mango->getWeight();
echo $mango->getWeight();
