<?php

namespace OopToDoList\Model;

class ProductRepositoryFromFilesystem implements ProductRepository
{
    private const STORAGE_FILE = __DIR__ . '/../../data/storage.json';
    public function store(Product $product): void
    {
         echo 'store from repository called';
        /*
        if (file_exists(self::STORAGE_FILE)) {
            file_put_contents(self::STORAGE_FILE, json_encode([]));
        }
        $product = json_decode(file_get_contents(self::STORAGE_FILE));

        $products[] = [
            'id' => $product->id(),
            'name' => $product->name(),
            'category' => $product->quantity(),
        ];
        file_put_contents(self::STORAGE_FILE, json_encode($product));
        */
    }

    public function remove(string $id): void
    {
        echo 'remove' . $id;
        // do nothing
    }

    public function findAll(): array
    {
        return [
            new Product('Laptop'),
            new Product('Keyboard'),
            new Product('Mouse'),
        ];
    }
}