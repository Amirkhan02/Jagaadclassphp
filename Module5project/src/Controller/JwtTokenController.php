<?php

namespace Project5\Controller;

use DI\Container;
use Firebase\JWT\JWT;
use Laminas\Diactoros\Response\JsonResponse;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class JwtTokenController
{
    private string $secret;

    public function __construct(Container $container)
    {
        $this->secret = $container->get('settings')['jwt_secret'];
    }
    public function __invoke(Request $request, Response $response, $args): JsonResponse
    {
        json_decode($request->getBody()->getContents(), true);

        $payload = [
            'sub' => '1234567890',
            'name' => 'Amir Khan',
            'iat' => 1356999524
        ];

        $jwt = JWT::encode($payload, $this->secret);

        return new JsonResponse(['token' => $jwt], 201);
    }

}