<?php

namespace Project5\Controller;

use OpenApi\Annotations as OA;
use Project5\Entity\CreateCategories;

/**
 * @OA\Schema(schema="DeleteCategoryResponse")
 */
readonly class DeleteCategoryResponse
{
    public function __construct(
        /** @OA\Property(property="status", type="string", example="success"), */
        public string $id,
    ) {}
    public static function deleteCategory(CreateCategories $createCategories): array
    {
        return [
            'status' => 'success',
        ];
    }

}