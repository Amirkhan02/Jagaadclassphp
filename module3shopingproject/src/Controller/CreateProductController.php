<?php

namespace OnlineShopping\Controller;

use OnlineShopping\Factory\ProductRepositoryFactory;
use OnlineShopping\Model\Product;

class CreateProductController
{
    public function handle(): void
    {
        $product = new Product(
            filter_input(INPUT_POST, 'name'),
            filter_input(INPUT_POST, 'description'),
            filter_input(INPUT_POST, 'price'),
            filter_input(INPUT_POST, 'quantity')
        );

        $repository = ProductRepositoryFactory::makeProduct();
        $repository->createProduct($product);

        header('Location: /index.php');
    }

}