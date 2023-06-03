<?php


use Project5\Controller\CreateCategoriesController;
use Project5\Controller\CreatePostsCategoriesController;
use Project5\Controller\DeleteCategoriesController;
use Project5\Controller\DeletePostsController;
use Project5\Controller\GetAllCategoriesController;
use Project5\Controller\GetAllPostsController;
use Project5\Controller\GetByIdController;
use Project5\Controller\GetBySlugController;
use Project5\Controller\GetCategoryByIdController;
use Project5\Controller\HomeController;
use Project5\Controller\JwtTokenController;
use Project5\Controller\OpenApiController;
use Project5\Controller\UpdateCategoriesController;
use Project5\Controller\UpdatePostsController;
use Project5\Middleware\CustomErrorHandler;
use Slim\Factory\AppFactory;
use Tuupola\Middleware\JwtAuthentication;

require __DIR__ . '/../bootstrap.php';

$container = require __DIR__ . '/../config/container.php';

$authMiddleware = new JwtAuthentication([
    'secret' => $container->get('settings')['jwt_secret']
]);

AppFactory::setContainer($container);

$app = AppFactory::create();

$customErrorHandler = new CustomErrorHandler($app);


$app->post('/generate/jwt', new JwtTokenController($container));
$app->get('/v1/posts/all', new GetAllPostsController($container));
$app->post('/v1/posts/create', new CreatePostsCategoriesController($container))->add($authMiddleware);
$app->post('/v1/categories/create', new CreateCategoriesController($container));
$app->get('/v1/categories/all', new GetAllCategoriesController($container));
$app->put('/v1/posts/{id}', new UpdatePostsController($container))->add($authMiddleware);
$app->delete('/v1/posts/{id}', new DeletePostsController($container))->add($authMiddleware);
$app->get('/', HomeController::class);
$app->get('/openapi', OpenApiController::class);
$app->put('/v1/categories/{id}', new UpdateCategoriesController($container));
$app->delete('/v1/categories/{id}', new DeleteCategoriesController($container));
$app->get('/v1/posts/{id}', new GetByIdController($container));
$app->get('/v1/categories/{id}', new GetCategoryByIdController($container));
$app->get('/v1/posts/getSlug/{slug}', new GetBySlugController($container));
$app->get('/post-docs', fn () => file_get_contents(__DIR__ . '/api-docs/index.html'));


$errorMiddleware = $app->addErrorMiddleware(false, true, true);
$errorMiddleware->setDefaultErrorHandler($customErrorHandler);

$app->run();