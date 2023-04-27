<?php

namespace OnlineShopping\Controller;

class ViewCartController
{
    public function handle(): void
    {
        session_name('cart_session');
        session_start();
        if (!isset($_SESSION['cart_session'])) {
            $_SESSION['cart_session'] = array();
        }
        require_once __DIR__ . '/../View/cart.php';
    }

}