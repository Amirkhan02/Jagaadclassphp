<?php
$mssqli = new mysqli(
    'localhost',
    'root',
    '',
    'php_course'
);

//check connection
if ($mssqli->connect_errno) {
    echo 'failed to connect to MySQL: ' . $mysqli->connect_errno;
    exit;
}

//echo 'connected';

$sql = 'SELECT task_id, name FROM task ORDER BY name;';
$result = $mysqli->query($sql);

$rows = $result->fetch_all(MYSQL_ASSOC);

foreach ($rows as $row) {
    echo 'Task_ID: ' .$row['task_id'] . '- name: ' . $row['name'] . PHP_EOL;
    echo '----------------' . PHP_EOL;
}

$result->free_result();
$mysqli->close();