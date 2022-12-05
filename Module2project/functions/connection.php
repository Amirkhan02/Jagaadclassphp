<?php

function connect() {
    $mysqli = new mysqli('localhost', 'root', '', 'module2project');
    
    //check connection
    if ($mysqli->connect_errno) {
        echo 'failed to connect to MySQL: ' . $mysqli->connect_error;
        exit;
    }
    return $mysqli;
}