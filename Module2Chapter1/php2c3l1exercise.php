<?php
$mssqli = new mysqli(
    'localhost',
    'root',
    '',
    'exercise1'
);

if ($mssqli->connect_errno) {
    echo 'failed to connect to MySQL: ' . $mysqli->connect_errno;
    exit;
}
echo 'connected';
$sql = <<<SQL
INSERT INTO exercise1 (class, course, exercise_grade, created_at)
VALUES(
'php', 
'mySql', 
54, 
Now()
);
SQL;
$mysqli->query($sql);

$result->free_result();
$mysqli->close();






?>


