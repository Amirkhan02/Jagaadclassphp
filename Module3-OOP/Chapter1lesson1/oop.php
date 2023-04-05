<?php

class Company 
{
    public $year = 2020;

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function displayName() {
        echo $this->name . PHP_EOL;
    }
}

$jagaad = new Company('Jagaad');
$google =new Company('Google');

$jagaad->displayName();
echo $jagaad->year;

echo PHP_EOL .'..................' . PHP_EOL;

$google->displayName();
echo $google->year;
   