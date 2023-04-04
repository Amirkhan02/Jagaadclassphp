<?php

namespace ApiProject\Controller;

use ApiProject\Blogpost\GetCategory;
use ApiProject\Dbconnection;
use Psr\Http\Message\ResponseInterface;

class GetCategoriesController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $conn = Dbconnection::connect();
        $getCategories = new GetCategory($conn);
        $data = $getCategories->get($args(['id']));
        return new Laminas\Diactoros\Response\JsonResponse($data, 201);

    }

}