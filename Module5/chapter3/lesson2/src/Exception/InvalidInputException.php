<?php

namespace SimpleShop\Exception;

class InvalidInputException extends \InvalidArgumentException
{
    private array $errors = [];

    public function getInputErrors(array $errors): array
    {
        return $this->errors;
    }

    public static function fromErrors(array $errors): self
    {
        $exception = new self('invalid inputs exception');
        $exception->errors = $errors;
        return $exception;
    }

}