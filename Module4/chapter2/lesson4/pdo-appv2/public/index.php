<?php

require_once __DIR__ . '/../boot.php';

use PdoApp\Database\PdoConnectionFactory;

$pdo = PdoConnectionFactory::make();

var_dump($pdo);

echo 'connected';
