<?php

namespace Jagaad\presentation\Option;

use Jagaad\presentation\Option;

class KeyboardOption extends ProductOption implements option
{
    public function key(): string
    {
        return '2';
    }

    public function description(): string
    {
        return 'Keyboard, $150';
    }

    public function handle(): void
    {
        $this->addProduct(new product ('Keyboard', 150));
    }
}