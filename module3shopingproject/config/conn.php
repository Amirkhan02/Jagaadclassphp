<?php

$host = 'localhost';
$dbname = 'project3-online shopping';
$username = 'root';
$password = '';

try {
    return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}