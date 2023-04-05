<?php

namespace SimpleShop\Repository;

use Doctrine\ORM\EntityManager;
use SimpleShop\Model\Product;

class ProductRepositoryFromDoctrine implements ProductRepository
{
    public function __construct(private EntityManager $entityManager)
    {

    }
    public function store(Product $product): void
    {
        $this->entityManager->persist($product);
        $this->entityManager->flush();
    }

}