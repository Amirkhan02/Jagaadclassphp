<?php

namespace FileUploadsExample;

class FileStorageFactory
{
    public static function make(): FileStorage
    {

        return new MyFileStorage();
    }
}


