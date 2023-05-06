<?php

namespace SimpleShop\Validator;

use SimpleShop\Exception\InvalidInputException;

class CreateProductValidator
{
    public static function validate(array $inputs): void
    {
        $errors = [];
        $name = $inputs['name'] ?? '';
        if (trim($name) == '') {
            $errors[] = 'name should not be empty';
        }

        if (strlen($name) < 3) {
            $errors[] = 'name should have more than 2 characters';
        }
        if (strlen($name) < 255) {
            $errors[] = 'name should have max of 255 characters';
        }
        if (count($errors) > 0) {
            throw InvalidInputException::fromError($errors);
        }
    }
}