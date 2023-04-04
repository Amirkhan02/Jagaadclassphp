<?php

namespace ApiProject\Controller;

use ApiProject\Blogpost\GetCategory;
use ApiProject\Dbconnection;
use Psr\Http\Message\ResponseInterface;

class GetCategoriesController
{
    /**
     * @OA\Get(
     *     path="/v3/blog/postsCategories",
     *     description="Returns the post categories posted"
     *     @OA\Parameter(
     *     description="ID of category to fetch",
     *     in="path",
     *     name="id",
     *     required=true,
     *     @OA\Schema(
     *     type="string",
     *   )
     * )
     *     @OA\Response(
     *     response="200",
     *     description="The category ID"
     *   )
     * )
     */
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $conn = Dbconnection::connect();
        $getCategories = new GetCategory($conn);
        $data = $getCategories->get($args(['id']));
        return new Laminas\Diactoros\Response\JsonResponse($data, 201);

    }

}