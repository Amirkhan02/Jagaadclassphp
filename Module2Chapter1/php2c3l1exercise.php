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
54, Now()
)
SQL;
$mysqli->query($sql);

/*$row = $result->fetch_array(MYSQLI_ASSOC);
echo 'Class: ' . $row["class"] . PHP_EOL;
echo 'Course: ' . $row["course"] . PHP_EOL;
echo 'Grade: ' . $row["exercise_grade"] . PHP_EOL;
*/
$result->free_result();
$mysqli->close();






?>


CREATE TABLE exercise1 (
    exercise_id INTEGER NOT NULL AUTO_INCREMENT,
    class VARCHAR(50) NOT NULL,
    course TEXT NOT NULL, 
    exercise_grade VARCHAR(50) NOT NULL,
    created_at DATE NOT NULL,
    PRIMARY KEY (task_id)
    );

     INSERT INTO exercise1
        (exercise_id, class, course, exercise_grade, created_at)
        VALUES
        (1, 'php', 'mySql', 54, Now())