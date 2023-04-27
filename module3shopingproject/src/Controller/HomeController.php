<?php

namespace OnlineShopping\Controller;

use OnlineShopping\Factory\ProductRepositoryFactory;

class HomeController
{
    public function handle(): void
    {
        $repository = ProductRepositoryFactory::makeProduct();
        $products = $repository->getAllProducts();

        require_once __DIR__ . '/../View/home.php';
    }
}