<?php

namespace OnlineShopping3\Controller;

class ControllerManager
{
    /** @var Controller[] */
    private array $controllers;
    public function add(Controller $controller): self
    {
        $this->controllers[] = $controller;
        return $this;
    }
    public function handle(array $products): array
    {
        $action = $products['action'] ?? '';
        foreach ($this->controllers as $controller){
            if ($controller->canHandle($action)) {
                return $controller->handle($products);
            }
            throw new \InvalidArgumentException('sorry, I can not handle your request');
        }
    }
}