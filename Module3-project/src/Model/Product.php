<?php

namespace OnlineShopping\Model;

class Product
{
    public function __construct(
        public string $id,
        public string $name,
        public string $description,
        public float $price,
        public string $quantity,
    ){}
    public function id(): int
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
    public function price(): float
    {
        return $this->price;
    }
    public function quantity(): int
    {
        return $this->quantity;
    }
}