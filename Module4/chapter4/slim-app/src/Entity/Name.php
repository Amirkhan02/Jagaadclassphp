<?php

namespace ShortenUrl\Entity;

use Assert\Assertion;
use Assert\AssertionFailedException;


class Name
{
    /**
     * @throws AssertionFailedException
     */
    public function __construct(private readonly string $name)
    {
        Assertion::minLength($this->name, 5, 'Url name should have min of 5 characters');
    }

    public function toString(): string
    {
        return $this->name;
    }

    public function __toString(): string
    {
        return $this->toString();
    }


}