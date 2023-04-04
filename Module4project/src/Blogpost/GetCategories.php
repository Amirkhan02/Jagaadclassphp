<?php

namespace ApiProject\Blogpost;

class GetCategories
{
    public function __construct(private \PDO $conn)
    {
    }
    public function  create(array $data): string
    {
        $stm = $this->conn->prepare('INSERT INTO posts_category SELECT  :id FROM posts  UNION SELECT :id FROM categories');



        $stm->bindParam(':posts_id', $data['id_posts']);
        $stm->bindParam(':posts_category', $data['id_category']);

        $stm->execute();

        return $data['id_posts'];
    }

}