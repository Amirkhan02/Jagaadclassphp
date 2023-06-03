<?php

namespace Project5\Repository;

use Project5\Entity\CreateCategories;
use Ramsey\Uuid\UuidInterface;

interface CategoriesRepository
{
    public function createCategories(CreateCategories $createCategories): void;
    public function getAllCategories(): array;
    public function fetchById(UuidInterface $id): CreateCategories;
    public function deleteCategories(UuidInterface $id): string;
    public function updateCategories(UuidInterface $id, array $data): void;
    public function getByIdString($id): CreateCategories;
}
