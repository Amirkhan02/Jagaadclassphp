<?php
$input1 = $argv[0];
$input2 = $argv[2];
$input3 = $argv[3];

$min = $input1;

if ($min < $input2) {
    $min = $input1;
} else {
    $min = $input2;

}
if ($min > $input3) {
    $min = $input3;
}
    echo $min;
?>