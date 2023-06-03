<?php

namespace Project5\Controller;

use DI\Container;
use Laminas\Diactoros\Response\JsonResponse;
use OpenApi\Annotations as OA;
use Project5\Repository\CategoriesRepository;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

/**
 * @OA\Delete(
 *     path="/v1/categories/{id}",
 *     description="Delete category by ID.",
 *     tags={"Categories"},
 *     @OA\Parameter(
 *         description="ID of category to delete",
 *         in="path",
 *         name="id",
 *         required=true,
 *         @OA\Schema(
 *             type="string",
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Prompt message after deleting any category",
 *          @OA\MediaType(
 *           mediaType="application/json",
 *           @OA\Schema(ref="#/components/schemas/DeleteCategoryResponse"),
 *         )
 *     )
 * )
 */
class DeleteCategoriesController
{
    private CategoriesRepository $categoriesRepository;

    public function __construct(Container $container)
    {
        $this->categoriesRepository = $container->get(CategoriesRepository::class);
    }
    public function __invoke(Request $request, Response $response, $args): JsonResponse
    {
        $this->categoriesRepository->deleteCategories(Uuid::fromString($args['id']));

        $output = [
            'status' => 'success'
        ];

        return new JsonResponse($output);

    }

}