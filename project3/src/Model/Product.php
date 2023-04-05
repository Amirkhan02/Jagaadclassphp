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
}

