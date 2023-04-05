<?php

namespace Jagaad\presentation\Option;

use  Jagaad\presentation\Option;

class MonitorOptions extends ProductOption implements option
{
    public function key(): string
    {
        return '3';
    }

    public function description(): string
    {
        return 'Monitor, $500';
    }

    public function handle(): void
    {
        $this->addProduct(new product ('Monitor', 500));
    }

}