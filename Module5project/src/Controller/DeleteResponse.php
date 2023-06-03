<?php

namespace Project5\Controller;

use OpenApi\Annotations as OA;
use Project5\Entity\CreatePosts;

/**
 * @OA\Schema(schema="DeleteResponseResult")
 */

readonly class DeleteResponse
{
    public function __construct(
        /** @OA\Property(property="status", type="string", example="success"), */
        public string $id,
    ){}

    public static function deletePost(CreatePosts $createPosts): array
    {
        return [
            'status' => 'success',
        ];
    }
}