<?php

use DI\Container;
use Doctrine\Common\Cache\Psr6\DoctrineProvider;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use OrmLesson\Database\PdoFactory;
use OrmLesson\Repository\UserRepository;
use OrmLesson\Repository\UserRepositoryFromDoctrine;
use OrmLesson\Repository\UserRepositoryFromPdo;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

const APP_ROOT = __DIR__ . '/..';

$container = new Container();

$container->set('settings', static function() {
    return [
        'displayErrorDetails' => true,
        'determineRouteBeforeAppMiddleware' => false,

        'db' => [
            'host' => $_ENV['DB_HOST'] ?? 'localhost',
            'dbname' => $_ENV['DB_NAME'] ?? 'test',
            'user' => $_ENV['DB_USER'] ?? 'root',
            'pass' => $_ENV['DB_PASS'] ?? 'root',
        ],

        'doctrine' => [
            // Enables or disables Doctrine metadata caching
            // for either performance or convenience during development.
            'dev_mode' => true,

            // Path where Doctrine will cache the processed metadata
            // when 'dev_mode' is false.
            'cache_dir' => APP_ROOT . '/var/doctrine',

            // List of paths where Doctrine will search for metadata.
            // Metadata can be either YML/XML files or PHP classes annotated
            // with comments or PHP8 attributes.
            'metadata_dirs' => [APP_ROOT . '/src'],

            // The parameters Doctrine needs to connect to your database.
            // These parameters depend on the driver (for instance the 'pdo_sqlite' driver
            // needs a 'path' parameter and doesn't use most of the ones shown in this example).
            // Refer to the Doctrine documentation to see the full list
            // of valid parameters: https://www.doctrine-project.org/projects/doctrine-dbal/en/current/reference/configuration.html
            'connection' => [
                'driver' => 'pdo_mysql',
                'host' => $_ENV['DB_HOST'],
                'port' => 3306,
                'dbname' => $_ENV['DB_NAME'],
                'user' => $_ENV['DB_USER'],
                'password' => $_ENV['DB_PASS'],
            ]
        ]
    ];
});

$container->set(\PDO::class, static function ($c) {
    $object = new PdoFactory();
    return $object($c);
});

$container->set(UserRepository::class, static function (Container $c) {
    $em = $c->get(EntityManager::class);
    return new UserRepositoryFromDoctrine($em);
});

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

    return EntityManager::create($settings['doctrine']['connection'], $config);
});

return $container;

