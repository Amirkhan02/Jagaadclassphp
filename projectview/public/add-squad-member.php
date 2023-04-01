<?php

use SessionObject\Squad;

require_once __DIR__ . '/../init.php';

$member = findSquadMember(filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL));

$sessionSquad = $_SESSION['squad'] ?? null;
$squad = null === $sessionSquad
    ? new Squad()
    : unserialize($sessionSquad);

$squad->add($member);

$_SESSION['squad'] = serialize($squad);

echo "Member <i><b>$member->name</b></i> added to the squad :) <br><br>";

echo '<i><a href="index.php"> << All members</a></i><br><br>';

echo '<i><a href="my-squad.php">>> My Squad</a></i>';
