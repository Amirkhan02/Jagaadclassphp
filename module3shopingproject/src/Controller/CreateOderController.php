<?php

namespace OnlineShopping\Controller;

use OnlineShopping\Factory\OrderRepositoryFactory;
use OnlineShopping\Model\Order;

session_name('cart_session');
session_start();

class CreateOderController
{
    public function handle(): void
    {
        $order = new Order(
            filter_input(INPUT_POST, 'total'),
            filter_input(INPUT_POST, 'completed_at'),
        );

        $repository = OrderRepositoryFactory::makeOrder();
        $repository->createOrder($order);

        session_destroy();

        //require_once __DIR__ . '/../../views/order.php';
    }

}