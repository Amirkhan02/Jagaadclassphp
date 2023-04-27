<?php

namespace OnlineShopping\Factory;

use OnlineShopping\Repository\OrderItemsRepository;
use OnlineShopping\Repository\OrderItemsRepositoryFromPdo;

class OrderItemsRepositoryFactory
{
    public static function makeOrderItems(): OrderItemsRepositoryFromPdo
    {
        $pdo = require __DIR__ . '/../../config/conn.php';
        return new OrderItemsRepositoryFromPdo($pdo);
    }

}