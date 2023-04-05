<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Uphpload\Controller\UploadFileController;
use Uphpload\Repository\FileRepositoryFactory;

$action = $_GET['action'] ?? '';

if ($action == 'upload') {
    $controller = new UploadFileController();
    $controller->handle();
    echo 'file uploaded and moved :)';
    echo '<meta http-equiv="Refresh" content="2; url=/index.php" />';




    die;
}
    $repository = \Uphpload\Repository\FileRepositoryFactory::make();
    $file = $repository->findAll();
    require_once __DIR__ . '/../Views/index.php';


