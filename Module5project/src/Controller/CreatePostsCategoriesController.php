<?php

namespace Project5\Controller;

use DateTimeImmutable;
use DI\Container;
use Laminas\Diactoros\Response\JsonResponse;
use Project5\Entity\CreatePosts;
use Project5\Repository\CategoriesRepository;
use Project5\Repository\PostsRepository;
use Project5\Validator\CreatePostsValidator;
use Ramsey\Uuid\Uuid;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

/**
 * @OA\Post(
 *     security={{"bearerAuth": {}}},
 *     path="/v1/posts/create",
 *     description="Add post",
 *     tags={"Posts"},
 *     @OA\RequestBody(
 *         description="Create a new post",
 *         required=true,
 *         @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(property="title", type="string", example="The begining of my coding"),
 *                  @OA\Property(property="slug", type="string",
 * example="--automatically from the title--"),
 *                  @OA\Property(property="content", type="string", example="Me becoming a great developer"),
 *                  @OA\Property(property="thumbnail", type="string", example="Base64 Encoded String"),
 *                  @OA\Property(property="author", type="string", example="Krivan Raul"),
 *                  @OA\Property(property="category_id", type="string",
 *  example="[]"),
 *      )
 *    )
 * ),
 * @OA\Response(
 *     response="200",
 *     description="The ID of the post",
 *       @OA\MediaType(
 *           mediaType="application/json",
 *           @OA\Schema(ref="#/components/schemas/CreateResponseResult"),
 *       )
 *     )
 *   )
 * )
 */
class CreatePostsCategoriesController
{
    private PostsRepository $postsRepository;
    private CategoriesRepository $categoriesRepository;

    public function __construct(Container $container)
    {
        $this->postsRepository = $container->get(PostsRepository::class);
        $this->categoriesRepository = $container->get(CategoriesRepository::class);
    }
    public function __invoke(Request $request, Response $response, $args): JsonResponse
    {
        $data = json_decode($request->getBody()->getContents(), true);

        $unique = uniqid();

        $b64 = $data['thumbnail'];

        file_put_contents('images/' . $unique . '.jpg', base64_decode($b64));

        $slugify = new Slugify();
        $slug = $slugify->slugify($data['title']);

        CreatePostsValidator::validate($data);

        $posts = new CreatePosts(
            Uuid::uuid4(),
            $data['title'],
            $slug,
            $data['content'],
            $_ENV['APP_URL'] . 'images/' . $unique . '.jpg',
            $data['author'],
            new DateTimeImmutable(),
        );

        foreach ($data['category_id'] as $id) {
            $category = $this->categoriesRepository->getByIdString($id);
            $posts->addCategory($category);
        }

        $this->postsRepository->createPosts($posts);

        return new JsonResponse($posts->toArray(), 201);
    }
}