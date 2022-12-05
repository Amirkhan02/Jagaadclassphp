<?php

function validateInputs(array $inputs): bool

{


    $arrDate = explode('-', $inputs['transaction_date']);

    if (count($arrDate) !== 3) {
        throw new InvalidArgumentException('Invalid transaction_date');
    }

    if (! checkdate($arrDate[1], $arrDate[2], $arrDate[0])) {
        throw new InvalidArgumentException('Invalid transaction_date');
    }
    if ($inputs['amount'] <= 0) {
        throw new InvalidArgumentException('Invalid amount');
    }


    $validStatus = ['paid', 'unpaid'];
if (in_array($inputs['status'], $validStatus)) {
    throw new InvalidArgumentException('Invalid status, it must be paid or unpaid');
}


$validTypes = ['income', 'expenses'];
if (! in_array($inputs ['type'], $validTypes)) {
    throw new InvalidArgumentException('Invalid type, it must be income or expenses');
}
return true;
}

//throw new InvalidArgumentException('Invalid transaction_date')