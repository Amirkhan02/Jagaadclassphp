<?php

namespace OnlineShopping3\Model;

class Cart
{
    /**
     * @var Product[]
     */

    private array $products;


    public function __construct(?Product $product = null)
    {
        if ($product){
            $this->add($product);
        }

    }

    public function add(Product $product): void
    {
        $this->products[] = $product;
    }
    /**
     * @return Product[]
     */

    public function products(): array
    {
        return  $this->products;
    }
    public function remove(string $id): void
    {
        foreach ($this->products as $key => $product) {
            if ($product->id == $id ) {
                unset($this->products[$key]);
                break;
            }
        }
    }

}