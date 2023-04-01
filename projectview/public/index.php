<?php

require_once __DIR__ . '/../init.php';

//session_destroy();

$members = allSquadMembers();

echo '<h1>Squad Options</h1>';

echo '<ul>';
foreach ($members as $member) {
    echo "<li>$member->name [$member->email] <a href='add-squad-member.php?email=$member->email'>Add</a></li>";
}
echo '</ul>';

echo '<i><a href="my-squad.php">>> My Squad</a></i>';

