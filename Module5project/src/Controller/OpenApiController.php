<?php

namespace Project5\Controller;

use Laminas\Diactoros\Response\JsonResponse;
use OpenApi\Annotations as OA;
use OpenApi\Generator;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

/**
 * @OA\Info(title="API Project5", version="1.0")
 * @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      type="http",
 *      scheme="bearer"
 * )
 */
class OpenApiController
{
    public function __invoke(Request $request, Response $response, $args): JsonResponse
    {
        $openapi = Generator::scan([__DIR__ . '/../../src']);

        return new JsonResponse(json_decode($openapi->toJson()));
    }
}