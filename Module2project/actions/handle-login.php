<?php

require_once __DIR__  . '/../boot.php';



$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); 
$password = filter_input(INPUT_POST, 'password');


$isValidStudent = login($email, $password);

if ($isValidStudent) {
        header('Location: /index.php');
        die;
} 
logout();


storeAlertMessage('<b>Attention!</b> Email or password invalid.', ALERT_MSG_ERROR);
logout();
header('Location: /login.php');