<?php

namespace Uphpload\Repository;

class FileRepositoryFactory
{
    public static function make(): FileRepository
    {
        return new FileRepositoryFomFilesystem();
    }
}
