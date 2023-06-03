<?php

namespace Project5\Controller;

use DI\Container;
use Laminas\Diactoros\Response\JsonResponse;
use OpenApi\Annotations as OA;
use Project5\Repository\CategoriesRepository;
use Ramsey\Uuid\Uuid;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

/**
 * @OA\Get(
 *     path="/v1/categories/{id}",
 *     description="Returns  Category by ID.",
 *     tags={"Categories"},
 *     @OA\Parameter(
 *         description="ID of category to get",
 *         in="path",
 *         name="id",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Category response"
 *     )
 * )
 */
class GetCategoryByIdController
{
    private CategoriesRepository $categoriesRepository;

    public function __construct(Container $container)
    {
        $this->categoriesRepository = $container->get(CategoriesRepository::class);
    }

    public function __invoke(Request $request, Response $response, $args): JsonResponse
    {
        $category = $this->categoriesRepository->fetchById(Uuid::fromString($args['id']));

        return new JsonResponse($category->toArray());
    }
}