<?php

namespace OnlineShopping\Controller;

interface Controller
{
    public function canHandle(string $action): bool;
    public function handle(array $inputs = []): array;
}