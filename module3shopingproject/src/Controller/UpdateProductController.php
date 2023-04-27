<?php

namespace OnlineShopping\Controller;

use OnlineShopping\Factory\ProductRepositoryFactory;

class UpdateProductController
{
    public function handle(): void
    {
        if (isset($_POST['id']) && $_POST['name'] && $_POST['description'] && $_POST['price'] && $_POST['quantity']) {

            $productParams = [
                $id = $_POST['id'],
                $name = $_POST['name'],
                $description = $_POST['description'],
                $price = $_POST['price'],
                $quantity = $_POST['quantity'],
            ];

            $productRepository = ProductRepositoryFactory::makeProduct();
            $productRepository->updateProduct($productParams);

            header('Location: /index.php');
        }
        $id = (int)filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $productRepository = ProductRepositoryFactory::makeProduct();
        $product = $productRepository->getById($id);

        require_once __DIR__ . '/../View/update.php';
    }

}