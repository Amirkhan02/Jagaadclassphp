<?php

namespace OnlineShopping3\Model;

class ProductRepositoryFromFilesystem implements ProductRepository

{
    private const STORAGE_FILE = __DIR__ . '/../data/storage.json';
    public function store(Product $product): void
    {
        echo 'store from repository called :)<br>';

        if (! file_exists(self::STORAGE_FILE)) {
            file_put_contents(self::STORAGE_FILE, json_encode([]));
        }
        $products = json_decode(file_get_contents(self::STORAGE_FILE));

        $products[] = [
          'id' => $product->id(),
          'name' => $product->name(),
          'description' => $product->description(),
          'price' => $product->description(),
          'quantity' => $product->quantity(),
        ];

        file_put_contents(self::STORAGE_FILE, json_encode($products));

    }

    public function remove(string $id): void
    {
        // do nothing
    }

    public function findAll(): array
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