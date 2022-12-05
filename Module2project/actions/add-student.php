<?php 
require_once __DIR__ . '/../boot.php';


$inputs = [
    'student_id' => filter_input(INPUT_POST, 'student_id'),
    'registration' => filter_input(INPUT_POST, 'registration_num'),
    'class' => filter_input(INPUT_POST, 'class_room'),
    'fullname' => filter_input(INPUT_POST, 'full_name'),
    'grade' => filter_input(INPUT_POST, 'grade'),
    'email' => filter_input(INPUT_POST, 'email'),
    'password' => filter_input(INPUT_POST, 'password'),
];



insertStudent($inputs);


   echo '<b>Success!</b> Transaction Created';
   header("Location: /index.php");
   die;
