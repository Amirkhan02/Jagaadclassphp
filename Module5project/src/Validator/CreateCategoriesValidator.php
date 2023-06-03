<?php

namespace Project5\Validator;

use Project5\Exception\InvalidException;

class CreateCategoriesValidator
{
    public static function validate(array $data): void
    {
        $errors = [];
        $name = $data['name'] ?? '';
        if (trim($name) === '') {
            $errors[] = 'name should not be empty';
        }
        if (strlen($name) < 3) {
            $errors[] = 'name should not have less than 3 characters';
        }
        if (strlen($name) > 25) {
            $errors[] = 'name should not have over 25 characters';
        }
        $description = $data['description'] ?? '';
        if (trim($description) === '') {
            $errors[] = 'description should not be empty';
        }
        if (strlen($description) < 5) {
            $errors[] = 'description should not have less than 5 characters';
        }
        if (strlen($description) > 50) {
            $errors[] = 'description should not have over 20 characters';
        }
        if (count($errors) > 0) {
            throw InvalidException::fromErrors($errors);
        }
    }

}