<?php

class Fruit 
{
   
    public string $name;
    public string $color;

    function __construct(string $name)
    {
        $this->name = $name;
        $this->color = 'transparent';
    }
    function getName(): string
    {
        return $this->name . PHP_EOL;
    }

    function setColor(string  $color) 
    {
        $this->color = $color;
    }
    function getColor() : string
    {
        return $this->color . PHP_EOL;
    }
}
$object = new Fruit('apple');

echo $object->getName();
echo $object->getColor();

$object->setColor('blue');
echo $object->getColor();

echo PHP_EOL . '............................' . PHP_EOL;

echo $mango->getName();
echo $mango->getColor();

$mango->setColor('grey');
echo $mango->getColor();