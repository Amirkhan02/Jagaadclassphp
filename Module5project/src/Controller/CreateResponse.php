<?php

namespace Project5\Controller;

use OpenApi\Annotations as OA;
use Project5\Entity\CreatePosts;

/**
 * @OA\Schema(schema="CreateResponseResult")
 */
readonly class CreateResponse
{
    public function __construct(
        /** @OA\Property(property="id", type="string", example="3315e7c4-cc8c-4d89-b989-c40a05cbde8c"), */
        public string $id,
    ){}

    public static function createPost(CreatePosts $createPosts): self
    {
        return new CreateResponse(
            $createPosts->id(),
        );
    }
}