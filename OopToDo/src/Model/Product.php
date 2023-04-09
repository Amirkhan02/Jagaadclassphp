<?php

namespace OopToDoList\Model;

class Product
{
    private string $id;
    private string $name;
    private string $category;

    public function __construct(string $name, $category, $price, $quantity)
    {
        $this->name = $name;
        $this->id = uniqid('product_id', true);
        $this->category = $category;

    }
    public function id(): string
    {
        return $this->id;
    }
    public function name(): string
    {
        return $this->name;
    }
    public function category(): string
    {
        return $this->category;
    }
    public function price(): float
    {
        return $this->price;
    }
    public function quantity(): string
    {
        return $this->quantity;
    }
}