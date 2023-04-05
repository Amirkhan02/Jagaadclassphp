<?php

function validateUserInputs(array $inputs): bool

{
    if ($inputs['password'] !== $inputs['repeat_password']) {
        throw new InvalidArgumentException('passwords do not match');
    }
   
    if ($inputs['password'] !== $inputs['repeat_password']) {
        throw new InvalidArgumentException('passwords do not match');
    }

    if  (getUserByEmail($inputs['email']) !== null) {
        throw new InvalidArgumentException('user email already exist');
    }
    return true;
}