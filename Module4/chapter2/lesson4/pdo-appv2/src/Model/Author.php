<?php

namespace PdoApp\Model;

class Author
{
    private string $country;
    public function __construct(
        private string $authorID,
        private string $name,
    ){
        $this->country = 'anywhere';
    }

    public static function populate(array $data): self
    {
        $self = new Author($data['id'], $data['name']);
        $self->country = $data['country'];
    }
    public function id(): string
    {
        return $this->authorID;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function country(): string
    {
        return $this->country;
    }

}