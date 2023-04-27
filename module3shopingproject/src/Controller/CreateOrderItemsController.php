<?php

namespace OnlineShopping\Controller;

use OnlineShopping\Factory\OrderItemsRepositoryFactory;
use OnlineShopping\Model\OrderItems;

class CreateOrderItemsController
{
    public function handle(): void
    {
        $orderItems = new OrderItems(
            filter_input(INPUT_POST, 'quantity'),
            filter_input(INPUT_POST, 'price')
        );

        $repository = OrderItemsRepositoryFactory::makeOrderItems();
        $repository->createOrderItems($orderItems);

        header('Location: /index.php');

    }
}