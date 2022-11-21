<?php
require_once __DIR__ . '/connection.php';
function insertTransaction(array $inputs) 
{
 $mysqli = connect();
 $sql = <<<SQL
 INSERT INTO transactions (
    name, 
    amount, 
    category, 
    transaction_date, 
    occurrence, 
    status, 
    type,
    account_id
 )VALUES (?, ?, ?, ?, ?, ?, ?, ?)
 SQL;

 $fixedAccount = 1;

$stmt = $mysqli->prepare($sql);
$stmt->bind_param(
    'ssssssss',
$inputs['name'],
$inputs['amount'],
$inputs['category'],
$inputs['transaction_date'],
$inputs['occurrence'],
$inputs['status'],
$inputs['type'],
$fixedAccount
);
$stmt->execute();
}

function findTransactions(): array
{
    $mysqli = connect();
$sql = <<<SQL
    SELECT * FROM transactions
    SQL; 
    $result = $mysqli->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}