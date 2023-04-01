<?php

namespace OnlineShopping\Controller;

use OnlineShopping\Model\ProductRepository;

class AddProductList implements Controller
{
    private ProductRepository $repository;
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;

    }
    public function canHandle(string $action): bool
    {
        return $action === 'add-product';
    }

    public function handle(array $inputs = []): array
    {

        $template = require __DIR__ . '/../View/home.php';

        return  $template();

    }


}