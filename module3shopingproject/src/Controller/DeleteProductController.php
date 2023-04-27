<?php

namespace OnlineShopping\Controller;

use OnlineShopping\Factory\ProductRepositoryFactory;

class DeleteProductController
{
    public function handle(): void
    {
        $id = (int)filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $productRepository = ProductRepositoryFactory::makeProduct();
        $product = $productRepository->getById($id);
        $productRepository->deleteProduct($product);

        header('Location: /index.php');
    }

}