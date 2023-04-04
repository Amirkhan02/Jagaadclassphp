<?php

use Laminas\Diactoros\ServerRequestFactory;
use League\Route\Router;
use Psr\Http\Message\ServerRequestInterface;
use ApiProject\Controller\CreateCategoryController;
use ApiProject\Controller\CreatePostController;
use ApiProject\Controller\GetCategoriesController;
use OpenApi\Annotations\OpenApi as OA;

require_once __DIR__ . '/../vendor/autoload.php';

//header('Content-Type: application/json');

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$router = new League\Route\Router;


$router->post('/v1/blog/posts', \ApiProject\Controller\CreatePostController::class);
$router->post('/v2/blog/category', \ApiProject\Controller\CreateCategoryController::class);
$router->get('/v3/blog/postsCategories', \ApiProject\Controller\GetCategoriesController::class);

$response = $router->dispatch($request);
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);

