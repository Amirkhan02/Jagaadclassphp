<?php

namespace OnlineShopping3\Controller;

use OnlineShopping3\Model\Product;
use OnlineShopping3\Model\ProductRepository;

class AddProductController implements Controller
{
    private ProductRepository $repository;
    public function __construct(ProductRepository $repository)
    {
       $this->repository = $repository;
    }
    public function canHandle(string $action): bool
    {
     return $action == 'home';
    }
public function handle(?array $products = []): array
{
  $name = (string)$products['name'];
   $product = new Product($name);
   $this->repository->store($product);
    return [
      'id' => $product->id(),
    ];
}


}