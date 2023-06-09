<?php

use Laminas\Diactoros\ServerRequestFactory;
use League\Route\Router;
use RestApi\Controller\CreateStudentController;
use RestApi\Controller\DeleteStudentController;
use RestApi\Controller\GetStudentController;
use RestApi\Controller\ListStudentsController;
use RestApi\Controller\UpdateStudentController;

require_once __DIR__ . '/../vendor/autoload.php';

$request = ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$router = new Router;

$router->post('/v1/school/students', CreateStudentController::class);
$router->put('/v1/school/students/{id}', UpdateStudentController::class);
$router->delete('/v1/school/students/{id}', DeleteStudentController::class);
$router->get('/v1/school/students/{id}', GetStudentController::class);
$router->get('/v1/school/students', ListStudentsController::class);

$response = $router->dispatch($request);

(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);

