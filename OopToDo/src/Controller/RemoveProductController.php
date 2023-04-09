<?php

namespace OopToDoList\Controller;

use OopToDoList\Model\ProductRepository;

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

    public function handle(?array $inputs = []): array
    {
        $id = $inputs['id'] ?? '';
        $this->repository->remove($id);
        return ['id' => $id];
    }
}