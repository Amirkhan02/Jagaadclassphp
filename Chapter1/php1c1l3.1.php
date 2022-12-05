<?php
$input = $argv[1];
$sum = 0;
while ($input <= 9){
    $sum += $input;
    echo $input;
    $input++;
    
}
echo $sum;
?>