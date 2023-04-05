<?php

namespace Uphpload\Filestoragetorage;

interface FileStorage
{
    public function store(File $file): void;

    /**
     * @param File[] $files
     * @return void
     */
    public function storeAll(array $files): void;
}
