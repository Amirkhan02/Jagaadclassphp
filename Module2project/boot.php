<?php


// this file is resonsible to startup the application config
session_start();

//functions
require_once __DIR__ . '/functions/connection.php';

require_once __DIR__ . '/functions/auth.php';
require_once __DIR__ . '/functions/db-students.php';
require_once __DIR__ . '/functions/validatestudent.php';
require_once __DIR__ . '/functions/alert-msg.php';