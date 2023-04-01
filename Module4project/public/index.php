<?php

use Psr\Http\Message\ServerRequestInterface;

require_once __DIR__ . '/../vendor/autoload.php';

//header('Content-Type: application/json');

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$router = new League\Route\Router;

$router->post('/v1/blog/posts', function (ServerRequestInterface $request){
    $data = json_decode($request->getBody()->getContents(), true,512, JSON_THROW_ON_ERROR);
    $conn = \ApiProject\Dbconnection::connect();
    $createPost = new \ApiProject\Blogpost\CreatePost($conn);
    $id = $createPost->create($data);

    $res = [
        'status' => 'success',
        'data' => ['id' => $id],
    ];
    return new Laminas\Diactoros\Response\JsonResponse($res, 201);
});

$router->post('/v2/blog/category', function (ServerRequestInterface $request) use ($router) {
    $data = Json_decode($request->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
    $conn = \ApiProject\Dbconnection::connect();
    $createCategory = new \ApiProject\Blogpost\CreateCategory($conn);
    $id = $createCategory->create($data);

    $res = [
        'status' => 'success',
        'data' => ['id' => $id],
    ];
    return new Laminas\Diactoros\Response\JsonResponse($res, 201);
});

$response = $router->dispatch($request);
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);

