<?php

namespace Lesson4\Factory;

use Tuupola\Middleware\JwtAuthentication;

class JwtMiddlewareFactory
{
    public static function make(): JwtAuthentication
    {
        return new JwtAuthentication([
            'secrete' => $_ENV['JWT_SECRET']
        ]);
    }

}