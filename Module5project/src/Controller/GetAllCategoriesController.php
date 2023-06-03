<?php

namespace Project5\Controller;

use DI\Container;
use Laminas\Diactoros\Response\JsonResponse;
use OpenApi\Annotations as OA;
use Project5\Repository\CategoriesRepository;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

/**
 * @OA\Get(
 *     path="/v1/categories/all",
 *     description="Returns all categories.",
 *     tags={"Categories"},
 *     @OA\Response(
 *         response=200,
 *         description="Category response",
 *     )
 * )
 */

class GetAllCategoriesController
{
    private CategoriesRepository $categoriesRepository;

    public function __construct(Container $container)
    {
        $this->categoriesRepository = $container->get(CategoriesRepository::class);
    }
    public function __invoke(Request $request, Response $response): JsonResponse
    {
        $createCategories = $this->categoriesRepository->getAll();
        return  $this->toJson($createCategories);
    }
    private function toJson(array $createCategories): JsonResponse
    {
        $categoriesResponse = [];
        foreach ($createCategories as $category){
            $categoriesResponse[] = [
              'id' => $category->id()->toString(),
              'name' => $category->name(),
                'description' => $category->description(),
            ];
        }
        return new JsonResponse($categoriesResponse);
    }

}