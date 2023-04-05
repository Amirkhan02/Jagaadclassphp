<?php
class Audi {
    public const MODEL = 'A6';

    /*
    private const MODEL = 'A6';

    public function model() {
        echo self::MODEL;
    }
    */
}

//echo Audi::MODEL;
/*
$object = new Audi;
$object->model();
*/

class pi {
    public static $value = 3.1234;

}

echo pi::$value;

pi::$value = 2;

echo PHP_EOL;

echo pi::$value;