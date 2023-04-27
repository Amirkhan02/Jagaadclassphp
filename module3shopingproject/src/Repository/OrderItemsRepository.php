<?php

namespace OnlineShopping\Repository;

use OnlineShopping\Model\OrderItems;

interface OrderItemsRepository
{
    public function createOrderItems(OrderItems $orderItems): void;
    public function getAllOrderItems(): array;

}