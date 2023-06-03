<?php

namespace Project5\Controller;

use OpenApi\Annotations as OA;
use Project5\Entity\CreatePosts;

/**
 * @OA\Schema(schema="UpdateResponseResult")
 */

readonly class UpdateResponse
{
    public function __construct(
        /** @OA\Property(property="title", type="string", example="Best Course Example"), */
        public string $title,
        /** @OA\Property(property="slug", type="string", example="Course Example"), */
        public string $slug,
        /** @OA\Property(property="content", type="string", example="A course that helps you create examples"), */
        public string $content,
        /** @OA\Property(property="thumbnail", type="string", example="Base64 Encoded String"), */
        public string $thumbnail,
        /** @OA\Property(property="author", type="string", example="Raul K"), */
        public string $author,
        /** @OA\Property(property="posted_at", type="string", example="2023-02-02 17:07:10") */
        public string $posted_at,
    ){}

    public static function updatePost(CreatePosts $createPosts): self
    {
        return new UpdateResponse(
            $createPosts->title(),
            $createPosts->slug(),
            $createPosts->content(),
            $createPosts->thumbnail(),
            $createPosts->author(),
            $createPosts->postedAt()->format('Y-m-d H:i:s'),
        );
    }
}