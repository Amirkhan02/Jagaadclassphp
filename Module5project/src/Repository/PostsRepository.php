<?php

namespace Project5\Repository;



use Project5\Entity\CreatePosts;
use Ramsey\Uuid\UuidInterface;

interface PostsRepository
{
    public function createPosts(CreatePosts $createPosts): void;
    public function getAllPosts(): array;
    public function getById(UuidInterface $id): CreatePosts;
    public function deletePosts(UuidInterface $id): string;
    public function updatePosts(UuidInterface $id, array $data): void;
    public function getBySlug($slug): array;

}