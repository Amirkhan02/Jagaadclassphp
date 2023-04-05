<?php

namespace Jagaad\presentation;

use Jagaad\presentation\Option\CheckoutOption;
use Jagaad\presentation\Option\LaptopOption;
use Jagaad\presentation\Option\KeyboardOption;
use Jagaad\presentation\Option\MonitorOptions;
use Jagaad\presentation\Option\MouseOption;
use Jagaad\presentation\Option\QuitOption;
use Jagaad\presentation\Terminal;
use Jagaad\Shop\Cart;

final class Application
{
    public function run(): void
    {
        $cart = new Cart();

        $terminal = new Terminal();

        $terminal->addOption(new LaptopOption($cart));
        $terminal->addOption(new KeyboardOption($cart));
        $terminal->addOption(new MouseOption($cart));
        $terminal->addOption(new MonitorOptions($cart));
        $terminal->addOption(new CheckoutOption($cart));
        $terminal->addOption(new QuitOption());

        $terminal->run();
    }

}