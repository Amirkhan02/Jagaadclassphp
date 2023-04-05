<?php

namespace PdoApp\Repository;

use PdoApp\Database\PdoConnectionFactory;

class AuthorRepositoryFactory
{
    public static function make(): AuthorRepository
    {
        $pdo = PdoConnectionFactory::make();
        return new AuthorsRepositoryFromPdo($pdo);
    }

}