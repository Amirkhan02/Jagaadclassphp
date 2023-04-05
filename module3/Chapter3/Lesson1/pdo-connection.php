<?php

try {
    $pdo = new PDO('mysql:localhost=localhost;dbname=personal_finance', 'root', '');

//echo 'connected';

    $rows = $pdo->query('SELECT transaction_id, name, category FROM transactions', PDO::FETCH_ASSOC);

}catch (PDOException $exception) {
    error_log($exception->getMessage());
    die('something went wrong. Please try again later,');
}


/*
//var_dump($rows->fetchAll());

foreach ($rows as $row) {
    echo $row['name'] . PHP_EOL;
}
*/

