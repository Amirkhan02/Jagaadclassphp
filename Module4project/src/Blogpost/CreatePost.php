<?php

namespace ApiProject\Blogpost;

class CreatePost
{
    public function __construct(private \PDO $conn)
    {
    }
    public function  create(array $data): string
    {
        $stm = $this->conn->prepare('INSERT INTO posts VALUES (:id, :title, :slug, :content, :thumbnail, :author, :posted_at)');

        $id = uniqid('post_id', true);

        $stm->bindParam(':id', $id);
        $stm->bindParam(':title', $data['title']);
        $stm->bindParam(':slug', $data['slug']);
        $stm->bindParam(':content', $data['content']);
        $stm->bindParam(':thumbnail', $data['thumbnail']);
        $stm->bindParam(':author', $data['author']);
        $stm->bindParam(':posted_at', $data['posted_at']);

        $stm->execute();

        return $id;
    }

}