<?php

namespace Uphpload\Repository;

class FakeFileRepository implements FileRepository
{
    public function storeAll(array $files): void
    {
        echo 'fake file stored all :) <br>';
    }
    public function store(File $fileName): void
    {
        echo 'fake file stored :) <br>';
    }
    public function findAll(): array
    {
        return[];
    }
}
