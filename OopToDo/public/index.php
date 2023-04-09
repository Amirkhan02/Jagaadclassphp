<?php

use OopTodoList\Application;
use OopToDoList\Controller\AddProductController;
use OopToDoList\Controller\ControllerManager;
use OopToDoList\Model\ProductRepositoryFromFilesystem;
use function OopToDoList\Controller\HomeController;
use function OopToDoList\Controller\RemoveProductController;

require_once  __DIR__ . '/../vendor/autoload.php';

(new Application())->run();
