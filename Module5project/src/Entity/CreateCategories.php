<?php

namespace Project5\Entity;



use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Doctrine\ORM\Mapping as ORM;

#[
    ORM\Entity,
    ORM\Table(name: 'categories')
    ]
class CreateCategories
{
    #[ORM\ManyToMany(targetEntity: CreatePosts::class, mappedBy: 'CreateCategories')]
    private Collection $post;
    public function __construct(
        #[ORM\Id,
            ORM\Column(type: 'uuid', unique: true),
            ORM\GeneratedValue(strategy: "CUSTOM"),
            ORM\CustomIdGenerator(class: UuidGenerator::class)
        ]
        private UuidInterface $id,
        #[ORM\Column(type: 'string', nullable: false)]
        private string $name,
        #[ORM\Column(type: 'string', nullable: false)]
        private string $description
    ){
        $this->post = new ArrayCollection();
    }
    public static function insert(array $data): self
    {
        return new self(
          Uuid::fromString($data['id']),
          $data['name'],
          $data['description']
        );
    }
    public function id(): UuidInterface
    {
        return  $this->id;
    }
    public function name(): string
    {
        return  $this->name;
    }
    public function description(): string
    {
        return  $this->description;
    }
    public function getPost(): Collection
    {
        return  $this->post;
    }
    public function getPosts(CreatePosts $posts): self
    {
        if (!$this->post->contains($posts)) {
            $this->post->add($posts);
            $posts->addCategory($this);
        }
        return $this;
    }
    public function toArray(): array
    {
        return [
            'id' => $this->id(),
            'name' => $this->name(),
           'description' =>  $this->description(),
        ];
    }
}