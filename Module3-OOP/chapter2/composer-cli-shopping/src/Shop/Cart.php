<?php
namespace Jagaad\Shop;

use Jagaad\Shop\Product;

class Cart {
    /** @var product[] */
    private array $products;

    public function __construct(Product $product = null)
    {
        $this->products = [];
        if ($product != null){
            $this->add($product);
        }
    }
    public function add(Product $product): void
    {
        $this->products[] = $product;
    }
     /**
      *  @return product[] */
    public function products(): array
    {
        return $this->products;
    }
}