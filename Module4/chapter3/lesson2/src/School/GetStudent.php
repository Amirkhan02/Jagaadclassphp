<?php

namespace RestApi\School;

class GetStudent
{
    public function __construct(private \PDO $conn)
    {
    }

    public function get(string $id): array
    {

        $stm = $this->conn->prepare('SELECT * FROM students WHERE id=id');
        $stm->bindParam(':id', $id);
        $stm->execute();
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
    public function all(): array
    {
        return$this->conn->prepare ('SELECT * FROM students')->fetchAll(\PDO::FETCH_ASSOC);
    }
}