<?php

namespace OnlineShopping3\Model;

interface ProductRepository
{
    /** @return Product[] */
    public function findAll(): array;
    public function store(Product $product): void;
    public function remove(string $id): void;

}