<?php
require_once __DIR__ . '/connection.php';
function insertAccount(array $inputs) 
{
 $mysqli = connect();
 $sql = <<<SQL
 INSERT INTO accounts (
    name, 
    description, 
    type, 
    user_id
 ) VALUES (?, ?, ?, ?)
 SQL;

 $user_id = 1;

$stmt = $mysqli->prepare($sql);
$stmt->bind_param(
    'ssss',
$inputs['name'],
$inputs['description'],
$inputs['type'],
$userId

);
$stmt->execute();
}

function deleteAccount(int $accountId)
{
    $mysqli = connect();
    $sql = 'DELETE  FROM accounts WHERE account_id = ?';

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $accountId);
    $stmt->execute();

}

function findAccounts(): array
{
    $mysqli = connect();
    $sql = 'SELECT*  FROM accounts';


    $result = $mysqli->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}