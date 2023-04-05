<?php

namespace OnlineShopping\Factory;

use PDO;

class PdoFactory
{
    public static function make(): PDO
    {
            return new PDO('mysql:host=localhost;dbname=product_list', 'root', 'root');
        }
}