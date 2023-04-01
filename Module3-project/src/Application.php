<?php

namespace OnlineShopping;

use OnlineShopping\Controller\AddProductList;
use OnlineShopping\Controller\ControllerManager;


class Application
{
    public function run(): void
    {
        $manager = new ControllerManager();

        $manager
            ->add(new AddProductList());

        $response = $manager->handle($_REQUEST);

        echo
        is_string($response['html']) ?
        $response['html'] :  var_dump($response);

    }


}