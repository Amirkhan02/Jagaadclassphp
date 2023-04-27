<?php

namespace OnlineShopping\Repository;

use OnlineShopping\Model\Product;

interface ProductRepository
{
    public function createProduct(Product $product): void;
    public function getAllProducts(): array;
    public function getById($id): Product;
    public function updateProduct(): void;
    public function deleteProduct($id): void;
}