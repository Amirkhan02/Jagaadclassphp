<?php

$sql = file_get_contents(__DIR__ . '/tables.sql');

try {
    $pdo = new PDO('mysql:localhost=localhost;dbname=test', 'root', '');
    $pdo->exec($sql);
    echo 'Tables created! :)';
}catch (PDOException $exception) {
    error_log($exception->getMessage());
    die('something went wrong. Please try again later,');
}
