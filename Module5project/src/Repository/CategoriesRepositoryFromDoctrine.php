<?php

namespace Project5\Repository;

use Doctrine\ORM\EntityManager;
use InvalidArgumentException;
use Project5\Entity\CreateCategories;
use Ramsey\Uuid\UuidInterface;

class CategoriesRepositoryFromDoctrine implements CategoriesRepository
{
    public function __construct(private EntityManager $entityManager)
    {
    }
    public function createCategories(CreateCategories $createCategories): void
    {
        $this->entityManager->persist($createCategories);
        $this->entityManager->flush();
    }
    public function getAllCategories(): array
    {
        return $this
            ->entityManager
            ->getRepository(CreateCategories::class)
            ->findBy();
    }
    public function fetchById(UuidInterface $id): CreateCategories
    {
        $resultId = $this
            ->entityManager
            ->getRepository(CreateCategories::class)
            ->findOneBy(['id' => $id]);
        if ($resultId === null) {
            throw new InvalidArgumentException('');
        }else {
            return $resultId;
        }
    }
    public function deleteCategories(UuidInterface $id): string
    {
        $category = $this->entityManager->getReference('Project5\Entity\CreateCategories', $id);
        $this->entityManager->remove($category);
        $this->entityManager->flush();
        return $id;
    }
    public function updateCategories(UuidInterface $id, array $data): void
    {
        $category = $this->entityManager->createQueryBuilder();
        $query = $category->update('Api\Entity\CreateCategories', 'c')
            ->set('c.name', ':name')
            ->set('c.description', ':description')
            ->where('c.id = :id')
            ->setParameter('name', $data['name'])
            ->setParameter('description', $data['description'])
            ->setParameter('id', $id)
            ->getQuery();
        $query->execute();
    }
    public function getByIdString($id): CreateCategories
    {
        return $this
            ->entityManager
            ->getRepository(CreateCategories::class)
            ->findOneBy(['id' => $id]);
    }


}