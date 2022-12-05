<?php

function validateStudent(array $inputs): bool

{
    $validStudent = ['email', 'password'];
    if (! in_array($inputs, $validStudent)) {
        throw new IvalidArgumentException('Invalid Student');
    }

    return true;
}