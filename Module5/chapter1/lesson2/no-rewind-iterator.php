<?php

$iterator = new ArrayIterator(['test1', 'test2', 'test3']);
$iterator->rewind();


$array = new NoRewindIterator($iterator);

foreach ($array as $item){
    echo $item . PHP_EOL;
}

foreach ($array as $item){
    echo $item . PHP_EOL;
}