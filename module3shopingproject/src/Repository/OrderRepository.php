<?php

namespace OnlineShopping\Repository;

use OnlineShopping\Model\Order;

interface OrderRepository
{
    public function createOrder(Order $order): void;
    public function getAllOrders(): array;

}