<?php

namespace Project5Test\Entity;

use PHPUnit\Framework\TestCase;
use Project5\Entity\CreateCategories;
use Ramsey\Uuid\Uuid;

class CreateCategoriesTest extends TestCase
{
    public function testCreateCategoriesShouldWork(): void
    {
        $id = Uuid::uuid4();
        $name = 'Category name';
        $description = 'Category description';

        $categories = new CreateCategories(
            $id,
            $name,
            $description,
        );

        self::assertEquals($id, $categories->id());
        self::assertEquals($name, $categories->name());
        self::assertEquals($description, $categories->description());
    }
}