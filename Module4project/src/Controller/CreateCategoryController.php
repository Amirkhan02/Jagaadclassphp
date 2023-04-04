<?php

namespace ApiProject\Controller;

use ApiProject\Blogpost\CreateCategory;
use ApiProject\Dbconnection;
use JsonException;
use Psr\Http\Message\ResponseInterface;

class CreateCategoryController
{
    /**
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