<?php

namespace OnlineShopping3\Model;

interface ProductRepository
{
    /** @return Product[] */
    public function findAll(): array;
    public function addProduct(Product $product): void;
    public function removeProduct(string $id): void;

}