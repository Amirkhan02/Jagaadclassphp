<?php

require_once __DIR__ . '/../init.php';

use DI\Container;
use Doctrine\Common\Cache\Psr6\DoctrineProvider;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

$container = new Container();

$container->set('settings', require __DIR__ . '/doctrine-settings.php');

$container->set(EntityManager::class, function (Container $c): EntityManager {
    /** @var array $settings */
    $settings = $c->get('settings');

    // Use the ArrayAdapter or the FilesystemAdapter depending on the value of the 'dev_mode' setting
    // You can substitute the FilesystemAdapter for any other cache you prefer from the symfony/cache library
    $cache = $settings['doctrine']['dev_mode'] ?
        DoctrineProvider::wrap(new ArrayAdapter()) :
        DoctrineProvider::wrap(new FilesystemAdapter(directory: $settings['doctrine']['cache_dir']));

    $config = Setup::createAttributeMetadataConfiguration(
        $settings['doctrine']['metadata_dirs'],
        $settings['doctrine']['dev_mode'],
        null,
        $cache
    );

    Type::addType('uuid', 'Ramsey\Uuid\Doctrine\Doctrine\UuidType');

    return EntityManager::create($settings['doctrine']['connection'], $config);
});

$container->set('logger', function () {
    $logger = new Logger('api');
    $logger->pushHandler(new StreamHandler(__DIR__ . '/../data/logs/error.log', level::Error));
    $logger->pushHandler(new StreamHandler(__DIR__ . '/../data/logs/debug.log', level::Debug));
    return $logger;
});

return $container;


