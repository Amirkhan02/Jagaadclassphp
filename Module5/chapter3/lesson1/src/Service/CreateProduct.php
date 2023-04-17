<?php

namespace SimpleShop\Service;

use SimpleShop\Exception\DuplicateProductException;
use SimpleShop\Model\Product;
use SimpleShop\Repository\ProductRepository;

class CreateProduct
{
    public function __construct(private ProductRepository $repository)
    {

    }
    public function create(array $params): product
    {
        $name = $params['name'] ?? null;

        if ($this->repository->findByName($name) !== null) {
            throw DuplicateProductException::fromName($name);
        }

        $product = new Product(Uuid::uuid4(), $params['name']);
        $this->repository->store($product);

        return $product;
    }

}