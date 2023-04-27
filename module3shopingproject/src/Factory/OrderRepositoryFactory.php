<?php

namespace OnlineShopping\Factory;

use OnlineShopping\Repository\OrderRepositoryFromPdo;

class OrderRepositoryFactory
{
    public static function makeOrder(): OrderRepositoryFromPdo
    {
        $pdo = require __DIR__ . '/../../config/conn.php';
        return new OrderRepositoryFromPdo($pdo);
    }

}