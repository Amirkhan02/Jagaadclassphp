<?php

class Person {
    private string $name;
    private string $lastName;

    public function __construct(string $name, string $lastName)
    {
        $this->name = $name;
        $this->lastName = $lastName;

    }
    public function getName(): string {
        return $this->name;
    }
    public function setName(string $name): Person  {
        $this->name = $name;
        return $this;
        //return new Person($name, $this->name);
    }
    public function getLastName(): string {
        return $this->lstName;
    }

}
// immutable object example
$person = new Person('Hammed', 'Shittu');
$person2 = $person->setName('test'); //it returns a new person

echo $person2->getName(); //test
echo PHP_EOL;
echo $person->getName(); //Hammed

