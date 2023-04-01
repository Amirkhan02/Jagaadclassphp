<?php

namespace ManageBills;

use ManageBills\Action\CreateBillAction;
use ManageBills\Action\HomeAction;
use ManageBills\Action\PayBillAction;

class Application
{
    public function run(): void
    {
        $action = filter_input(INPUT_GET, 'action');

        match ($action) {
            'create-bill' => (new CreateBillAction())->handle(),
            'pay' => (new payBillAction())->handle(),
            default => (new HomeAction())->handle(),
        };
    }

}