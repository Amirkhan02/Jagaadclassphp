<?
/*
//This(final at the begining of a class) does not allow extension
final class Car2 {

}

class Audi extends Car2 {

}

$car = new Audi;
*/

class Car2 {
    //This does not all override from the child class
    //final public function turnOff()
    public function turnOff() {
        echo 'turned off';
    }

}
//child class hence it give error
class Audi extends Car2 {
    public function turnOff() {
        echo 'nothing';
    }

}

$car = new Audi;
$car->turnOff();


