<?php

namespace FileUploadsExample;

class File
{
    private string $fileNameAsUnique;
    public function __construct(
        private string $fileTempDir,
         private string $fileName,
    ){
        $fileExt = pathinfo($this->fileName, PATHINFO_EXTENSION);
        $this->fileNameAsUnique = uniqid('file', true) . '.' . $fileExt;

    }
    public function fileTempDir(): string {
        return $this->fileTempDir;
    }
    public function fileNameAsUnique(): string
    {
       return $this->fileNameAsUnique;
    }

}