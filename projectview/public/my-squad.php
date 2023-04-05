<?php

use SessionObject\Squad;

require_once __DIR__ . '/../init.php';

$sessionSquad = $_SESSION['squad'] ?? null;
$squad = null === $sessionSquad
    ? new Squad()
    : unserialize($sessionSquad);

echo '<h1>My Squad</h1>';

echo '<b><small>Qty: ' . count($squad->members) . '</small></b>';

echo '<ul>';
foreach ($squad->members as $member) {
    echo "<li>$member->name [$member->email], $member->role | <a href='remove-squad-member.php?email=$member->email'>Remove</a></li>";
}
echo '</ul>';

echo '<i><a href="index.php"> << All members</a></i>';

