<?php

namespace OopToDoList\Controller;

use OopToDoList\Model\ProductRepository;

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

    public function handle(?array $inputs = []): array
    {
        $template = require_once __DIR__ . '/../view/home.php';

        $products = $this->repository->findAll();

        return ['html' => $template($products)];
    }
}