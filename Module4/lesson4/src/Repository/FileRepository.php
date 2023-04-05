<?php

namespace Uphpload\Repository;

interface FileRepository
{
    public function store(File $fileName): void;
    /**
     * @param  File[] $files
     * @return void
     */
    public function storeAll(array $files): void;
    /** @return file[] */
    public function findAll(): array;
}
