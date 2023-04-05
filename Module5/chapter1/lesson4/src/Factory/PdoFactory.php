<?php

namespace Lesson4\Factory;

use PDO;

class PdoFactory
{
    public static function make(): PDO
    {
       return new PDO(
           'mysql:' . $_ENV['DB_HOST'] . 'dbname=' . $_ENV['DB_NAME'],
           $_ENV['DB_USER'],
           $_ENV['DB_PASS']
       );

    }
}