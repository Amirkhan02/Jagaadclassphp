<?php

namespace ApiProject\Controller;

use ApiProject\Blogpost\CreateCategory;
use ApiProject\Dbconnection;
use JsonException;
use Psr\Http\Message\ResponseInterface;
use OpenApi\Annotations as OA;
class CreateCategoryController
{
    /**
     * @OA\Post(
     *     path="v1/blog/category",
     *     description="Create new category",
     *     @OA\Response(
     *     response="200",
     *     description="The category ID"
     *   )
     * )
     * @throws JsonException
     */
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $data = Json_decode($request->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
        $conn = Dbconnection::connect();
        $createCategory = new CreateCategory($conn);
        $id = $createCategory->create($data);

        $res = [
            'status' => 'success',
            'data' => ['id' => $id],
        ];
        return new Laminas\Diactoros\Response\JsonResponse($res, 201);

    }

}