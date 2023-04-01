<?php

namespace Uphpload\Controller;

use Uphpload\FileStorage\FileStorageFactory;
use Uphpload\Repository\FakeFileRepository;

class UploadFileController
{
    private FileStorage $fileStorage;
    private FileRepository $fileRepository;
    public function __construct()
    {
        $this->fileStorage = FileStorageFactory::make();
        $this->fileRepository = FileRepository::make();
    }

    public function handle(): void
    {
        $fileStorage = FileStorageFactory::make();

        $fileToUpload = new File::withUniqueName(
            $_FILES['fileToUpload']['name'],
            $_FILES['fileToUpload']['tmp_name']
        );

        $anotherFile = new File::withUniqueName(
            $_FILES['anotherFile']['name'],
            $_FILES['anotherFile']['tmp_name']
        );

        $files = [ $fileToUpload, $anotherFile ];

        $this->fileStorage->storeAll();
        $this->fileRepository->storeAll();
    }
}
