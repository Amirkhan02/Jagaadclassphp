<?php

namespace Uphpload\FileStorage;

class File
{
    private string $fileName;
    private string $filePath;

    private function __construct(string $fileName, ?string $filePath = null)
    {
        $this->filePath = $filePath;
        $this->fileName = $fileName;
    }
    public static function withUniqueName(string $fileName, string $fileTempDir): self {
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileNameAsUnique = uniqid('file', true) . '.' . $fileExt;
        return new self($fileNameAsUnique, $fileTempDir);
    }
    public function fromFileName(string $fileName,): self
    {
        return new self($fileName);
    }
    public function path(): ?string
    {
        return $this->filePath;
    }

    public function name(): string
    {
        return $this->fileName;
    }
    public function __toString(): string
    {
        return $this-name();
    }
}
