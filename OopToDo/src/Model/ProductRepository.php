<?php

namespace OopToDoList\Model;

interface ProductRepository
{
    /**
     * @return array
     */
    public function findAll(): array;
    public function store(Product $product): void;
    public function remove(string $id): void;
}