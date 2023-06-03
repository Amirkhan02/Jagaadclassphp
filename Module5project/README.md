# Module 5 Project
#DESIGN PATTERNS

-Model-View-Controller (MVC)
-Repository
-Dependency Injection (DI)

#APP ROUTES

#Home

-[GET]/

#OPENAPI

-[GET] /openapi

#POST

-[POST] /v1/posts/create
-[GET] /v1/posts/all
-[GET] /v1/posts/{id}
-[GET] /v1/posts/getSlug/{slug}
-[PUT] /v1/posts/{id}
-[DELETE] /v1/posts/{id}

#CATEGORIES

-[POST] /v1/categories/create
-[GET] /v1/categories/all
-[GET] /v1/categories/{id}
-[PUT] /v1/categories/{id}
-[DELETE] /v1/categories/{id}

#JWT
-[POST] /jwt

#REQUIRED COMPOSER PACKAGES

-Slim Framework: composer require slim/slim:"4.*", composer require slim/psr7, composer require nyholm/psr7 nyholm/psr7-server, composer require guzzlehttp/psr7 "^2", composer require laminas/laminas-diactoros, composer require php-di/slim-bridge
-Ramsey Uuid: composer require ramsey/uuid
-Ramsey Uuid/Doctrine: composer require ramsey/uuid-doctrine
-Dotenv: composer require vlucas/phpdotenv
-Swagger: composer require zircote/swagger-php
-Slugify: composer require cocur/slugify
-Monolog: composer require monolog/monolog
-JWT: composer require firebase/php-jwt
-Optionally, install the paragonie/sodium_compat package from composer if your php is < 7.2 or does not have libsodium installed: composer require paragonie/sodium_compat
-Doctrine ORM: composer require doctrine/orm
-Doctrine Annotations: composer require doctrine/annotations
-Symfony Cache: composer require symfony/cache
-PHP Stan: composer require --dev phpstan/phpstan
-PHP Code Sniffer: composer require squizlabs/php_codesniffer - it will recognize that it needs to be added in the require dev
-PHP Unit: composer require --dev phpunit/phpunit ^9