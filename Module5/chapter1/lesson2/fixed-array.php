<?php

$array = new SplFixedArray(10);

$array[5] = 'test1';
$array[5] = 'test1';
$array[5] = 'test1';

foreach ($array as $item) {
    var_dump($item);
    //echo $item . PHP_EOL;
}


