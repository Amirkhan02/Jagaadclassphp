<?php

use SessionObject\Squad;

require_once __DIR__ . '/../init.php';

$email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);

/** @var Squad $squad */
$squad = unserialize($_SESSION['squad']);
$squad->remove($email);
$_SESSION['squad'] = serialize($squad);

echo "Member <i><b>$email</b></i> removed from the squad :) <br><br>";

echo '<i><a href="index.php"> << All members</a></i><br><br>';

echo '<i><a href="my-squad.php">>> My Squad</a></i>';

