<?php

$sql = file_get_contents(__DIR__ . '/tables.sql');
$reCreateDatabase = readline('Do you want to re-create your database? [no]');

$pdo = require_once __DIR__ . '/../config/conn.php';

if ($reCreateDatabase == 'yes') {
    $pdo->exec('DROP DATABASE IF EXISTS manage_bills');
}
$pdo->exec($sql);
echo 'Tables created! :)';
