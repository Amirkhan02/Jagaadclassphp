<?php

namespace PdoApp\Repository;

use PDO;
class AuthorsRepositoryFromPdo implements AuthorRepository
{
    public function __construct(private  \PDO $pdo)
    {

    }

    public function persist(array $authorData): AuthorRepository
    {
        if (! $this->pdo->inTransaction()){
            $this->pdo->beginTransaction();
        }
        $stm = $this->pdo->prepare('INSERT INTO authors VALUES (?, ?, ?)');
        $stm->execute([$authorData['id'], $authorData['name'], $authorData['country']]);

        return  $this;

    }

    public function flush(): void
    {
        if ($this->pdo->inTransaction()) {
            $this->pdo->commit();
        }
    }
}