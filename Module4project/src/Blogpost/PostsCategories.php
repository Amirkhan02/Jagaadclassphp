<?php

namespace ApiProject\Blogpost;

class PostsCategories
{
    public function __construct(private \PDO $conn)
    {
    }
    public function  create(array $data): string
    {
        $stm = $this->conn->prepare('INSERT INTO posts_category VALUES (:id_post, :id_category)');

        $id_post = uniqid('post_id', true);

        $stm->bindParam(':posts_id', $id_post);
        $stm->bindParam(':posts_category', $data['id_category']);

        $stm->execute();

        return $id_post;
    }

}