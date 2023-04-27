<?php

namespace OnlineShopping\Controller;

use OnlineShopping\Factory\ProductRepositoryFactory;

session_name('cart_session');
session_start();

class UpdateCartController
{
    public function handle(): void
    {
        if (isset($_POST['id']) && $_POST['name'] && $_POST['description'] && $_POST['price'] && $_POST['quantity']) {
            $productArrayUpdate = array();

            $productArray = $_SESSION['cart_session'];
            foreach ($productArray as $prod) {
                if ($_POST['id'] === $prod->id) {
                    $prod->quantity = $_POST['quantity'];
                }
                $productArrayUpdate[] = $prod;
            }
            $_SESSION['cart_session'] = $productArrayUpdate;

            require_once __DIR__ . '/../View/cart.php';
        } else {

            $id = (int)filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

            $productRepository = ProductRepositoryFactory::makeProduct();
            $product = $productRepository->getById($id);

            require_once __DIR__ . '/../View/updateCart.php';
        }
    }
}