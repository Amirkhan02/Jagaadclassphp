<?php

class Cart {
    /** @var product[] */

private array $products;

public function __construct(product $product)
{
    $this->add($product);
}

public function add(product $product): void
{
    $this->products[] = $product;
}
    /** 
     * @return product[] 
    */

public function products(): array
    {
        return  $this->products;
    }


}
