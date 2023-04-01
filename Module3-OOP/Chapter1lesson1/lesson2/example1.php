<?php

class Fruit {

}

class Car3 {

}
$object1 = new Fruit ('apple');

$object2 = new Car3;

if ($object1 instanceof fruit) {
    echo 'object1 is a fruit';
} else {
    echo 'object1 is a not fruit';
}