<?php 
require_once __DIR__ . '/../boot.php';
//echo '<pre>';
//var_dump($_POST);
try{
$inputs = [
    'name' => htmlentities(filter_input(INPUT_POST, 'name')),
    'amount' => (float)filter_input(INPUT_POST, 'amount'),
    'category' => htmlentities(filter_input(INPUT_POST, 'category')),
    'transaction_date' => filter_input(INPUT_POST, 'transaction_date'),
    'occurrence' => (bool)filter_input(INPUT_POST, 'occurrence'),
    'status' => filter_input(INPUT_POST, 'status'),
    'type' => filter_input(INPUT_POST, 'type'),
];

validateInputs($inputs);

insertTransaction($inputs);
   echo 'Transaction Created';
} catch(InvalidArgumentException $exception) {
    echo $exception->getMessage();
}








//echo filter_input(INPUT_POST, 'name');