<?php

namespace Jagaad\presentation\Option;

use Jagaad\presentation\Option;
class LaptopOption extends ProductOption implements option
{

    public function key(): string
    {
        return '1';
    }

    public function description(): string
    {
        return 'Laptop, $100';
    }

    public function handle(): void
    {
        $this->addProduct(new product ('Laptop linux', 100));
    }
}