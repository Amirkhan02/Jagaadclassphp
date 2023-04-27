<?php

namespace OnlineShopping;
use OnlineShopping\Controller\AddProductToCart;
use OnlineShopping\Controller\CreateOderController;
use OnlineShopping\Controller\CreateOrderItemsController;
use OnlineShopping\Controller\CreateProductController;
use OnlineShopping\Controller\DeleteProductController;
use OnlineShopping\Controller\HomeController;
use OnlineShopping\Controller\ListOrderItemController;
use OnlineShopping\Controller\UpdateCartController;
use OnlineShopping\Controller\UpdateProductController;
use OnlineShopping\Controller\ViewCartController;

class Application
{
    public function run(): void
    {
        $action = filter_input(INPUT_GET, 'action');

        match ($action) {
            'createProduct' => (new CreateProductController())->handle(),
            default => (new HomeController())->handle(),
            'deleteProduct' => (new DeleteProductController())->handle(),
            'updateProduct' => (new UpdateProductController())->handle(),
            'displayCatalogue' => (new DisplayCatalogueAction())->handle(),
            'displayCart' => (new ViewCartController())->handle(),
            'addToCart' => (new AddProductToCart())->handle(),
            'deleteFromCart' => (new DeleteFromCartAction())->handle(),
            'updateCart' => (new UpdateCartController())->handle(),
            'completeOrder' => (new CheckoutDisplayAction())->handle(),
            'createOrder' => (new CreateOderController())->handle(),
            'displayOrder' => (new ListOrderItemController())->handle(),
            'displayOrderItems' => (new DisplayOrderItemsAction())->handle(),
            'createOrderItems' => (new CreateOrderItemsController())->handle(),
        };
    }
}
