<?php

namespace OnlineShopping\Repository;

use OnlineShopping\Model\Product;

class ProductRepositoryFromPdo
{
    public function __construct(private \PDO $pdo)
    {}
    public function store(Product $product): array
    {
        $stm = $this->pdo->prepare(<<<SQL
             INSERT INTO product_list (id, name, description, price, quantity)
             VALUES (:id, :name, :description, :price, :quantity)

        SQL);

        $stm->execute([
            new Product('1', 'Laptop', 'Hp pavilion', 50, 4),
            new Product('2', 'TV', 'Panasonic', 55, 2),
            new Product('3', 'Phone', 'Samsung', 70, 5),
            new Product('4', 'Keyboard', 'Multipurpose', 20, 5),
            new Product('5', 'Calculator', 'Scientific', 20, 2),
            new Product('6', 'Bag', 'Laptop bag', 15, 2),
        ]);
    }

}