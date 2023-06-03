<?php

namespace Project5\Validator;

use Project5\Exception\InvalidException;

class CreatePostsValidator
{
    public static function validate(array $data): void
    {
        $errors = [];
        $title = $data['title'] ?? '';
        if (trim($title) === '') {
            $errors[] = 'title should not be empty';
        }
        if (strlen($title) < 5) {
            $errors[] = 'title should not have less than 5 characters';
        }
        if (strlen($title) > 15) {
            $errors[] = 'title should not have over 15 characters';
        }
        $content = $data['content'] ?? '';
        if (trim($content) === '') {
            $errors[] = 'content should not be empty';
        }
        if (strlen($content) < 3) {
            $errors[] = 'content should not have less than 3 characters';
        }
        if (strlen($content) > 225) {
            $errors[] = 'content should not have over 225 characters';
        }
       // $thumbnail = $data['thumbnail'] ?? '';
       // if (trim($thumbnail) === '') {
         //   $errors[] = 'thumbnail should not be empty';
       // }
        $author = $data['author'] ?? '';
        if (trim($author) === '') {
            $errors[] = 'author should not be empty';
        }
        if (count($errors) > 0) {
            throw InvalidException::fromErrors($errors);
        }
    }

}