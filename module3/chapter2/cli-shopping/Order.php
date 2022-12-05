<?php

class Order
{
    /** @var product[] */
private array $products;
private string $status; 
private float $changeAmount;

public function __construct(Cart $cart)
{
    $this->products = $cart->products();
    $this->status = 'created';
    $this->changeAmount = 0;
}

public function pay(float $insertAmount): float
{
    if ($this->status === 'created') {
        $this->changeAmount = $insertAmount - $this->total();
        $this->status = 'completed';
    }
    return $this->changeAmount;
}
public function total(): float
{
    $total = 0;
    foreach ($this->products as $product) {
        $total += $product->price();
    }
    return $total;
}

}