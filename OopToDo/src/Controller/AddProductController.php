<?php

namespace OopToDoList\Controller;

use OopToDoList\Model\Product;
use OopToDoList\Model\ProductRepository;

class AddProductController implements Controller
{
    private TaskRepository $repository;
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }
    public function canHandle(string $action): bool
    {
      return $action == 'add-product';
    }

    public function handle(array|null $inputs = []): array
    {
        $name = (string)$inputs['product_name'];
        $product = new Product($name);
        $this->repository->store($product);
        return [
            'id' => $product->id(),
        ];

    }

}