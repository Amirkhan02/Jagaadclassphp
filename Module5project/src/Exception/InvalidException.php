<?php

namespace Project5\Exception;

use InvalidArgumentException;

class InvalidException extends InvalidArgumentException
{
    private array $errors = [];


    public function getErrors(): array
    {
        return $this->errors;
    }
    public static function fromErrors(array $errors): self
    {
        $exception = new self('invalid exception');
        $exception->errors = $errors;

        return $exception;
    }

    public function getDataErrors()
    {
    }

}