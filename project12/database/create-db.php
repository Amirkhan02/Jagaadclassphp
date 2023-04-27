<?php

$sql = file_get_contents(__DIR__ . '/db.sql');

$reCreateDatabase = readline('Do you want to re-create your database? [no] ');

$pdo = require_once __DIR__ . '/../config/conn.php';

if ($reCreateDatabase === 'yes') {
    $pdo->exec('DROP DATABASE product_list');
}
$pdo->exec($sql);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully and tables created!";
