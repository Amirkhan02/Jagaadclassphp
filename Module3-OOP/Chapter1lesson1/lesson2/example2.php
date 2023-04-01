<?php

class Fruit {

    function printName() {
        echo 'Apple';
    }

    function printColor($color)
    {
        echo $color;
    }

}

$object = new Fruit ('apple');
$object2 = new Fruit ('orange');

//$object->printName();
$object->printColor('blue');

//echo PHP_EOL;

//$object2->printName();



