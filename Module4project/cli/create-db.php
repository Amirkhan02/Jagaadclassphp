<?php

require_once __DIR__ . '/../vendor/autoload.php';

$sql = file_get_contents(__DIR__ . '/db.sql');

$conn = \ApiProject\DbConnection::connect();
$conn->exec($sql);
