<?php

namespace Jagaad\presentation\Option;

use Jagaad\presentation\Option;

class MouseOption extends ProductOption implements option
{
    public function key(): string
    {
        return '4';
    }

    public function description(): string
    {
        return 'Mouse, $50';
    }

    public function handle(): void
    {
        $this->addProduct(new product ('Mouse', 50));
    }

}