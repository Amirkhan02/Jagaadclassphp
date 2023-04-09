<?php

namespace OopTodoList;

use OopToDoList\Controller\AddProductController;
use OopToDoList\Controller\ControllerManager;
use OopToDoList\Controller\HomeController;
use OopToDoList\Controller\RemoveProductController;
use OopToDoList\Model\ProductRepositoryFromFilesystem;

class Application
{
    public function run(): void
    {
        $repository = new ProductRepositoryFromFilesystem();

        $manager = new ControllerManager();
        $manager
            ->add(new AddProductController($repository))
            ->add(new RemoveProductController($repository))
            ->add(new HomeController());

        $response = $manager->handle($_REQUEST);

        echo $response['html'] ?? var_dump($response);
    }

}