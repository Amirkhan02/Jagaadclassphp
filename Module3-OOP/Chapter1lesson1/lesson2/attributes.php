<?php
class Fruit 
{
    //properties/Attributes
    public ?string $name;
    public ?string $color;

    //Methods
    function setName($name)
    {
        $this->name = $name;
    }
    function getName() : string
    {
        return $this->name . PHP_EOL;
    }

}

$object = new Fruit ('apple');
$object2 = new Fruit ('orange');


$object->setName('apple');
$object2->setName('orange');
echo $object->getName();

$object->setName('banana');
echo $object->getName();
echo $object->getName();

