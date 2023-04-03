<?php


// this file is responsible to start up the application config
session_start();

//functions
require_once __DIR__ . '/cli/connection.php';

require_once __DIR__ . '/functions/auth.php';
require_once __DIR__ . '/cli/db-students.php';
require_once __DIR__ . '/functions/validate-student.php';
require_once __DIR__ . '/functions/alert-msg.php';