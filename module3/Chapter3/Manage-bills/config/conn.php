<?php

try {
    return new \PDO('mysql:localhost=localhost;dbname=manage_bills', 'root', '');
}catch (PDOException $exception) {
    error_log($exception->getMessage());
    die('something went wrong. Please try again later,');
}