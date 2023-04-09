<?php

namespace OnlineShopping3\Controller;

use OnlineShopping3\Model\ProductRepository;

class HomeController implements Controller
{
    private ProductRepository $repository;
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function canHandle(string $action): bool
    {
        return $action == 'home' || $action == '';
    }

    public function handle(?array $products = []): array
    {
        $allProduct = require_once __DIR__ . '/../View/home.php';

        return ['html' => $allProduct($products)];
    }
}