<?php

namespace Uphpload\FileStorage;

use Uphpload\FileStorage\Adapter\FlysystemStorage;

class FileStorageFactory
{
    public static function make(): FileStorage
    {
       // return new MyFileStorage();
        return new FlysystemStorage();
    }
}
