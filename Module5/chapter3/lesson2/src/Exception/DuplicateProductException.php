<?php

namespace SimpleShop\Exception;

class DuplicateProductException extends \DomainException
{
    public static function fromName(string $name): self
    {
        return new self("Product with the name '$name' already exists");
    }
}