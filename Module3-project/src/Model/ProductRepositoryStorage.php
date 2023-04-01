<?php

namespace OnlineShopping\Model;

use function OnlineShopping\Repository\allProducts;

class ProductRepositoryStorage extends Product
{
    public function findAll(): array
    {
        function findProductById($id): ?Product
        {
            foreach (allProducts() as $item) {
                if ($item->id === $id) {
                    return $item;
                }
            }
            return null;
        }
    }


    public function store(Product $product): void
    {
        function allProducts(): array
        {
            return [
                new Product('1', 'Laptop', 'Hp pavilion', 50, 4),
                new Product('2', 'TV', 'Panasonic', 55, 2),
                new Product('3', 'Phone', 'Samsung', 70, 5),
                new Product('4', 'Keyboard', 'Multipurpose', 20, 5),
                new Product('5', 'Calculator', 'Scientific', 20, 2),
                new Product('6', 'Bag', 'Laptop bag', 15, 2),
            ];
        }
    }

    public function delete(string $id): void
    {
        // TODO: Implement delete() method.
    }
}

