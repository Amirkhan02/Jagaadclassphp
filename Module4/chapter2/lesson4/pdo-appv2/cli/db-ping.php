<?php

require_once __DIR__ . '/../boot.php';

$pdo = \PdoApp\Database\PdoConnectionFactory::make();

while (true) {
    echo ',';
    $result = $pdo->query('SELECT * FROM authors, books, books_authors');
    $result->fetchAll();
    sleep(0.2);
}
