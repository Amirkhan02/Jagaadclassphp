<?php

function validateAccountInputs(array $inputs): bool

{
    $validTypes = ['credit', 'debit'];
    if (! in_array($inputs['type'], $validTypes)) {
        throw new IvalidArgumentException('Invalid account type');
    }

    return true;
}