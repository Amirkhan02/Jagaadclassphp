<?php

namespace ShortenUrl\Controller;

use DI\Container;
use Laminas\Diactoros\Response\JsonResponse;
use ShortenUrl\Entity\Url;
use ShortenUrl\Repository\UrlRepository;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class ListUrlsController
{
    private UrlRepository $urlRepository;
    private string $baseUrl;
    public function __construct(Container $container)
    {
        $this->urlRepository = $container->get(UrlRepository::class);
        $this->baseUrl = $container->get('settings')['app']['domain'];
    }

    /**
     * @OA\Get(
     *     path="/v1/url",
     *     description="Returns all URLs.",
     *     tags={"ShortenUrl"},
     *     @OA\Response(
     *         response=200,
     *         description="Urls response",
     *         @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/UrlResponse")
     *         )
     *     )
     * )
     */

    public function __invoke(Request $request, Response $response, $args): JsonResponse
    {
        $urls = $this->urlRepository->all();
        return $this->toJson($urls);
    }
    private function toJson(array $urls): jsonResponse
    {
        $response = [];
        foreach ($urls as $url) {
            $response[] = UrlResponse::fromUrl($url, $this->baseUrl);
        }
        return new jsonResponse($response);
    }
}