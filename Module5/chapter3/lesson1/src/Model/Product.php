<?php

namespace SimpleShop\Model;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

#[ORM\Entity, Table(name: 'products')]
class Product
{
    public function __construct(
        #[ORM\Id, ORM\Column(type: 'uuid')]
        private UuidInterface $id,
        #[ORM\Column(type: 'string', unique: true, nullable: false)]
        private string $name,
    ) {}
    public function id(): UuidInterface
    {
        return $this->id;
    }
    public function name(): string
    {
        return $this->name;
    }

}