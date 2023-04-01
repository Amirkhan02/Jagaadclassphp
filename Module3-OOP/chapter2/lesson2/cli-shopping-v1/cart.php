<?php

class Cart {
    /** @var product[] */
    private array $product;

    public function __construct(product $product = null)
    {
        $this->products = [];
        if ($product != null){
            $this->add($product);
        }
    }
    public function add(product $product): void
    {
        $this->products[] = $product;
    }
     /**
      *  @return product[] */
    public function product(): array
    {
        return $this->products;
    }
}