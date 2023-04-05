<?php
//construct
/*
class Magic1 {
    public function __construct(){
        echo 'method called';
    }
}
$magic1 = new Magic1();
*/
/*
class Magic2 {
    //toString

    public function __toString() {
        return 'method to string called';
    }
}
$magic2 = new Magic2();

echo $magic2;
*/
/*
//call
class Magic3 {
    public function __call(string $name, array $arguments) {
       var_dump($name, $arguments);
    }
}
$magic3 = new Magic3();
$magic3->hello('Lucas');
*/

//get & set
/*
class Magic4 {
    private array $dynamicProps = [];

    /**
     * @return array
     */
    public function __get(string $name) {
        return $this->dynamicProps[$name] ?? null;
    }

    public function __set(string $name, $value): void {
        $this->dynamicProps[$name] = $value;
    }
}

$magic4 = new Magic4();

$magic4->name = 'Lucas';
$magic4->company = 'Jagaad';
$magic4->year = '2023';

echo $magic4->year;

*/

//invoke
class Magic5 {
    private string $name;

    public function __construct($name){
        $this->name = $name;
    }
    public function __invoke($name) {
        echo 'Hello, '. $this->name;
    }
}
$magic5 = new Magic5('Lucas');
$magic5();

/*
function func1($name) {
    return function () use ($name) {
        echo 'Hello, ' . $name;
    }
}
$func = func1('Lucas');
$func();
*/