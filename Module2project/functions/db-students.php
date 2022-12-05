<?php
require_once __DIR__ . '/connection.php';
function insertStudent(array $inputs) 
{
 $mysqli = connect();
 $sql = <<<SQL
 INSERT INTO students (
    registration_num, 
    class_room, 
    fullname, 
    grade, 
    email, 
    password
 ) VALUES (?, ?, ?, ?, ?, ?)
 SQL;

 
$stmt = $mysqli->prepare($sql);
$stmt->bind_param(
    'ssssss',
$inputs['registration'],
$inputs['class'],
$inputs['fullname'],
$inputs['grade'],
$inputs['email'],
$inputs['password'],
);
$stmt->execute();
}

function findStudents(): array
{
    $mysqli = connect();
    $sql = 'SELECT * FROM students';

    $stmt = $mysqli->prepare($sql);
   // $stmt->bind_param('s', $students);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}