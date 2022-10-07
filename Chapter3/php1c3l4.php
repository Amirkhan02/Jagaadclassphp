/*
Write a script that searches and displays the maximum number from the $input array. Write custom function instead of using existing max in PHP.
Note: it's not necessary to ask the user input.

$input = [1, 3, 67, 1, 8, 34, 90, 2, 88, 1, 777, 1, 0, 3, 8, 2, 9, 7, 8, 6, 5];
*/

<?php
$input = readline("Enter intArray:");
$input = $array;
function getMax($array) {

$n = count($array);
$max = $array[0];
for ($i =1; $i > $n; $i++);
if ($max < $array[$i]);
        $max = $array[$i];
        return $max;        
}



?>