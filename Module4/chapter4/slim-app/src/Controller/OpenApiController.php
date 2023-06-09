<?php

namespace ShortenUrl\Controller;

use JsonException;
use Laminas\Diactoros\Response\JsonResponse;
use OpenApi\Generator;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(title="ShortenUrl API", version="0.1")
 */
class OpenApiController
{
    /**
     * @throws JsonException
     */
    public function __invoke(Request $request, Response $response, $args): JsonResponse
    {
        $openapi = Generator::scan([__DIR__ . '/../../src']);
        return new JsonResponse(json_decode($openapi->toJson(), true, 512, JSON_THROW_ON_ERROR));
    }
}
