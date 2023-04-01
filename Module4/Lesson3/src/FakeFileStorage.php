<?php

namespace FileUploadsExample;

class FakeFileStorage implements FileStorage

{
    public function store(File $file): void
    {
        echo 'file fake storage called :P';
    }

    public function storeAll(array $files): void
    {
        echo 'file fake list storage called :P';
    }

}