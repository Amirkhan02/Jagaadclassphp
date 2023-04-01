<?php

namespace Project3\Controller;

use Project3\Model\ProductList;

class Product
{
    public function __construct(
        public array $list = [],
    ){}

    public function add(ProductList $list): void
    {
        $this->list[] = $list;
    }

    public function remove(string $id): void
    {
        foreach ($this->list as $key => $list) {
            if ($list->email === $id) {
                unset($this->list[$key]);
            }
        }
    }

}