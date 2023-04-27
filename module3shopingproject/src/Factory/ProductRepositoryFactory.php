<?php

namespace OnlineShopping\Factory;

use OnlineShopping\Repository\ProductRepositoryFromPdo;

class ProductRepositoryFactory
{
    public static function makeProduct(): ProductRepositoryFromPdo
    {
        $pdo = require __DIR__ . '/../../config/conn.php';
        return new ProductRepositoryFromPdo($pdo);
    }

}