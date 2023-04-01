<?php

use Laminas\Diactoros\ServerRequestFactory;
use League\Route\Router;
use Psr\Http\Message\ServerRequestInterface;
use RestApi\Controller\CreateStudentController;
use RestApi\Controller\ListStudentController;
use OpenApi\Annotations as OA;

require_once __DIR__ . '/../vendor/autoload.php';


$request = ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_COOKIE, $_FILES
);

$router = new Router;

$router->get('/v1/school/student', handler: CreateStudentController::class);
$router->get('/v1/school/student/{id}', ListStudentController::class);
$router->get('/v1/school/student', ListStudentController::class);

$response = $router->dispatch($request);

(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);

