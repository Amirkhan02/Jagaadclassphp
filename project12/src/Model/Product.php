<?php

namespace OnlineShopping3\Model;

class Product
{
    public function __construct(
        public string $id,
        public string $name,
        public string $description,
        public float  $price,
        public string $quantity,
    ){}

    public function id(): string
    {
        return $this->id;
    }
    public function name(): string
    {
        return $this->name;
    }
    public function description(): string
    {
        return $this->description;
    }
    public function quantity(): string
    {
        return $this->quantity;
    }

}

