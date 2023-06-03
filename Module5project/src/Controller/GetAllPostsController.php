<?php

namespace Project5\Controller;

use DI\Container;
use Laminas\Diactoros\Response\JsonResponse;
use OpenApi\Annotations as OA;
use Project5\Repository\PostsRepository;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

/**
 * @OA\Get(
 *     path="/v1/categories/all",
 *     description="Returns all posts.",
 *     tags={"Categories"},
 *     @OA\Response(
 *         response=200,
 *         description="Category response",
 *     )
 * )
 */
class GetAllPostsController
{
    private PostsRepository $postsRepository;

    public function __construct(Container $container)
    {
        $this->postsRepository = $container->get(PostsRepository::class);
    }
    public function __invoke(Request $request, Response $response, $args): JsonResponse
    {
        $posts = $this->postsRepository->getAllPosts();

        return $this->toJson($posts);
    }
    private function toJson(array $posts): JsonResponse
    {
        $postsCategories = [];
        foreach ($posts as $post){
            $postsCategories[] = $post->toArray();
        }
        return  new JsonResponse($postsCategories);
    }

}