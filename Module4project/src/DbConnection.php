<?php

namespace ApiProject;

class DbConnection
{
    public static function connect(): \PDO
    {
        return new \PDO('mysql:host=localhost;dbname=apiproject4', 'root', '');
    }

}