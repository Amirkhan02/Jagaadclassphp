<?php

namespace ApiProject\Controller;

use ApiProject\Blogpost\CreateCategory;
use ApiProject\Blogpost\CreatePost;
use ApiProject\Dbconnection;
use JsonException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CreatePostController
{
    /**
     * @throws JsonException
     */
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $data = json_decode($request->getBody()->getContents(), true,512, JSON_THROW_ON_ERROR);
        $conn = Dbconnection::connect();
        $createPost = new CreatePost($conn);
        $id = $createPost->create($data);

        $res = [
            'status' => 'success',
            'data' => ['id' => $id],
        ];
        return new Laminas\Diactoros\Response\JsonResponse($res, 201);
    }

}