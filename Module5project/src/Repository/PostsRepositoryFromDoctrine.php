<?php

namespace Project5\Repository;

use Doctrine\ORM\EntityManager;
use http\Exception\InvalidArgumentException;
use Project5\Entity\CreatePosts;
use Ramsey\Uuid\UuidInterface;

class PostsRepositoryFromDoctrine implements PostsRepository
{
    public function __construct(private EntityManager $entityManager)
    {
    }
    public function createPosts(CreatePosts $createPosts): void
    {
        $this->entityManager->persist($createPosts);
        $this->entityManager->flush();
    }
    public function getAllPosts(): array
    {
        return $this
            ->entityManager
            ->getRepository(CreatePosts::class)
            ->findAll();
    }
    public function getById(UuidInterface $id): CreatePosts
    {
        $resultId = $this
            ->entityManager
            ->getRepository(CreatePosts::class)
            ->findOneBy(['id' => $id]);
        if ($resultId === null) {
            throw new InvalidArgumentException('');
        } else {
            return $resultId;
        }
    }
    public function deletePosts(UuidInterface $id): string
    {
        $post = $this->entityManager->getReference('Project5\Entity\CreatePosts', $id);
        $this->entityManager->remove($post);
        $this->entityManager->flush();
        return $id;
    }
    public function updatePosts(UuidInterface $id, array $data): void
    {
        $post = $this->entityManager->createQueryBuilder();
        $query = $post->update('Project\Entity\CreatePosts', 'p')
            ->set('p.title', ':title')
            ->set('p.slug', ':slug')
            ->set('p.content', ':content')
            ->set('p.thumbnail', ':thumbnail')
            ->set('p.author', ':author')
            ->set('p.posted_at', ':posted_at')
            ->where('p.id = :id')
            ->setParameter('title', $data['title'])
            ->setParameter('slug', $data['slug'])
            ->setParameter('content', $data['content'])
            ->setParameter('thumbnail', $data['thumbnail'])
            ->setParameter('author', $data['author'])
            ->setParameter('posted_at', $data['posted_at'])
            ->setParameter('id', $id)
            ->getQuery();
        $query->execute();
    }
    public function getBySlug($slug): array
    {
        return $this
            ->entityManager
            ->getRepository(CreatePosts::class)
            ->findBy(['slug' => $slug]);
    }

}