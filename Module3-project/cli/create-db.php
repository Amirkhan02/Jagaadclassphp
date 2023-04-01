<?php

$pdo = new \PDO('mysql:host=localhost;dbname=product_list', 'root', 'root');
$sql = file_get_contents(__DIR__ . '/db.sql');
$pdo->exec($sql);

echo 'Database created';
