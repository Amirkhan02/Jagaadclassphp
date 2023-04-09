<?php

namespace OnlineShopping3\Controller;

use OnlineShopping3\Model\ProductRepository;

class RemoveProductController implements Controller
{
    private ProductRepository $repository;
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;

    }
    public function canHandle(string $action): bool
    {
        return $action == 'remove-product';
    }

    public function handle(?array $products = []): array
    {
        $id = $products['id'] ?? '';
        $this->repository->remove($id);
        return ['id' => $id];
    }
}