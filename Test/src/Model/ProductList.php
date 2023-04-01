<?php

namespace Project3\Model;

class ProductList
{
    public function __construct(
        public string $id,
        public string $name,
        public string $description,
        public string $price
    ){}

}