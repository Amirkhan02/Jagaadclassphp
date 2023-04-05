<?php

namespace ApiProject\Blogpost;

class CreateCategory
{
    public function __construct(private \PDO $conn)
    {
    }
    public function  create(array $data): string
    {
        $stm = $this->conn->prepare('INSERT INTO categories VALUES (:id, :name, :description)');

        $id = uniqid('category_id', true);

        $stm->bindParam(':id', $id);
        $stm->bindParam(':name', $data['name']);
        $stm->bindParam(':description', $data['description']);


        $stm->execute();

        return $id;
    }


}