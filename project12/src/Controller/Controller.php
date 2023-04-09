<?php

namespace OnlineShopping3\Controller;

interface Controller
{
    public function canHandle(string $action): bool;
    public function handle(?array $products = []): array;

}