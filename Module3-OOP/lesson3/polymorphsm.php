<?php
class shape {
    public function draw(){}

}

class Circle extends shape{
    public function draw() {
        echo "Circle has been drawn.</br>";
    }
}
class Triangle extends shape{
    public function draw() {
        echo "Triangle has been drawn.</br>";
    }
}


function test($shape){
    echo $shape->draw();
}

$a = new Triangle;
test($a);