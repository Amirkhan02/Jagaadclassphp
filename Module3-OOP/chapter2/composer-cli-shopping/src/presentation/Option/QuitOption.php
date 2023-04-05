<?php

namespace Jagaad\presentation\Option;
use Jagaad\presentation\Option;
class QuitOption implements option
{
    public function key(): string
    {
        return 'Q';
    }

    public function description(): string
    {
        return 'Quit';
    }

    public function handle(): void
    {

    }

}