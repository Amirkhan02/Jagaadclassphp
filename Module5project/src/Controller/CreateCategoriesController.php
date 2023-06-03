<?php

namespace Project5\Controller;

use DI\Container;
use Laminas\Diactoros\Response\JsonResponse;
use OpenApi\Annotations as OA;
use Project5\Entity\CreateCategories;
use Project5\Repository\CategoriesRepository;
use Project5\Validator\CreateCategoriesValidator;
use Ramsey\Uuid\Uuid;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

/**
 * @OA\Post(
 *     path="/v1/categories/create",
 *     description="Add a new category",
 *     tags={"Categories"},
 *     @OA\RequestBody(
 *         description="Create new category",
 *         required=true,
 *         @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(property="name", type="string", example="Grouped category"),
 *                  @OA\Property(property="description", type="string", example="This groped items in the grouped category"),
 *      )
 *    )
 * ),
 * @OA\Response(
 *     response="200",
 *     description="ID of the category",
 *       @OA\MediaType(
 *           mediaType="application/json",
 *           @OA\Schema(ref="#/components/schemas/CreateCategoryResponse"),
 *       )
 *     )
 *   )
 * )
 */

class CreateCategoriesController
{
    private CategoriesRepository $categoriesRepository;

    public function __construct(Container $container)
    {
        $this->categoriesRepository = $container->get(CategoriesRepository::class);
    }
    public function __invoke(Request $request, Response $response, $args): JsonResponse
    {
        $data = json_decode($request->getBody()->getContents(), true);

        CreateCategoriesValidator::validate($data);

        $categories = new CreateCategories(
            Uuid::uuid4(),
            $data['name'],
            $data['description'],
        );

        $this->categoriesRepository->createCategories($categories);

        $output = [
            'status' => 'success',
            'data' => [
                'id' => $categories->id(),
            ],
        ];

        return new JsonResponse($output, 201);
    }

}