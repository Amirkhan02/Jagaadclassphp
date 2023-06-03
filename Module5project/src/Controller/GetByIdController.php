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
 * @OA\Get(
 *     path="/v1/posts/{id}",
 *     description="Returns a Post by ID.",
 *     tags={"Posts"},
 *     @OA\Parameter(
 *         description="ID of post to get",
 *         in="path",
 *         name="id",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Post response"
 *     )
 * )
 */
class GetByIdController
{
    private PostsRepository $postsRepository;

    public function __construct(Container $container)
    {
        $this->postsRepository = $container->get(PostsRepository::class);
    }
    public function __invoke(Request $request, Response $response, $args): JsonResponse
    {
        $post = $this->postsRepository->GetById(Uuid::fromString($args['id']));

        return new JsonResponse($post->toArray(), 200);
    }

}