<?php

namespace OnlineShopping3;

use OnlineShopping3\Controller\AddProductController;
use OnlineShopping3\Controller\ControllerManager;
use OnlineShopping3\Controller\HomeController;
use OnlineShopping3\Controller\RemoveProductController;
use OnlineShopping3\Model\ProductRepositoryFromFilesystem;

class Application
{
    public function run(): void
    {
        $repository = new ProductRepositoryFromFilesystem();

        $manager = new ControllerManager();

        $manager
                 ->add(new AddProductController($repository))
                 ->add(new RemoveProductController($repository))
                 ->add(new HomeController($repository));

        $response = $manager->handle($_REQUEST);

        echo $response['html'] ?? var_dump($response);

    }

}