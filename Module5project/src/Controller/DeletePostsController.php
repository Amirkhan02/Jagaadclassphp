<?php

namespace Project5\Controller;

use DI\Container;
use Laminas\Diactoros\Response\JsonResponse;
use OpenApi\Annotations as OA;
use Project5\Repository\PostsRepository;
use Ramsey\Uuid\Uuid;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

/**
 * @OA\Delete(
 *     security={{"bearerAuth": {}}},
 *     path="/v1/posts/{id}",
 *     description="Delete post by ID.",
 *     tags={"Posts"},
 *     @OA\Parameter(
 *         description="ID of post to delete",
 *         in="path",
 *         name="id",
 *         required=true,
 *         @OA\Schema(
 *             type="string",
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Prompt message after deleting a post",
 *          @OA\MediaType(
 *           mediaType="application/json",
 *           @OA\Schema(ref="#/components/schemas/DeleteResponseResult"),
 *         )
 *     )
 * )
 */

class DeletePostsController
{
    private PostsRepository $postsRepository;

    public function __construct(Container $container)
    {
        $this->postsRepository = $container->get(PostsRepository::class);
    }
    public function __invoke(Request $request, Response $response, $args): JsonResponse
    {
        $this->postsRepository->deletePosts(Uuid::fromString($args['id']));

        $output = [
            'status' => 'success'
        ];

        return new JsonResponse($output);
    }
}
