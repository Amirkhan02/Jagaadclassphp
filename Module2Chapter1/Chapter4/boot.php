<?php


// this file is resonsible to startup the application config
session_start();

//functions
require_once __DIR__ . '/functions/connection.php';

require_once __DIR__ . '/functions/auth.php';
require_once __DIR__ . '/functions/db-transactions.php';
require_once __DIR__ . '/functions/validate-transaction.php';
require_once __DIR__ . '/functions/alert-message.php';