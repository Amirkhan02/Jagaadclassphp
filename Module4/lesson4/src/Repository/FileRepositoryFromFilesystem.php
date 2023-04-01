<?php

namespace Uphpload\Repository;

class FileRepositoryFromFilesystem implements FileRepository
{
    private const STORAGE_FILES = __DIR__ . '/../../storage/filenames.json';
    /**
     *param File[] $files
     *@retrun void
     */
    public function storeAll(array $files): void
    {
        foreach ($files as $file) {
            $this->store($file);
        }
    }
    public function store(File $fileName): void
    {
        $listOfFiles = $this->findAll();

        $listOfFileNames = [];
        foreach ($listOfFiles as $storedFile) {
            $listOfFileNames[] = $storedFile->name();
        }
        $listOfFileNames[] = $storedFile-name();
        file_put_contents(self::STORAGE_FILES, json_encode($listOfFileNames));
    }


    public function findAll(): array
    {
        if (! file_exists(self::STORAGE_FILES)) {
            file_put_contents(self::STORAGE_FILES, json_encode([]));
        }
        $fileName = (array)json_decode((string)file_get_contents(self::STORAGE_FILES), true);
        $files = [];
        /** @var string $name */
        foreach ($fileNames as $name) {
            $files[] = file::fromFileName($name);
        }
        return $files;
    }
}
