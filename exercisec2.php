<?php
$input = readline('Enter numbers in word between 0 and 9:');
$inputArray = explode(',', $input);

$inputedArray =[];
for ($i=0; $i<count($inputedArray); $i++) {
    switch ($inputedArray[$i]) {
        case 'zero':
            array_push($inputedArray, 0);
            break;
        case 'one':
            array_push($inputedArray, 1);
            break;
        case 'two':
            array_push($inputedArray, 2);
            break;
        case 'three':
            array_push($inputedArray, 3);
            break;
        case 'four':
            array_push($inputedArray, 4);
            break;
        case 'five':
            array_push($inputedArray, 5);
            break;
        case 'six':
            array_push($inputedArray, 6);
            break;
        case 'seven':
            array_push($inputedArray, 7);
            break;
        case 'eight':
            array_push($inputedArray, 8);
            break;
        case 'nine':
            array_push($inputedArray, 9);
            break;   
        default:
            echo 'Enter the correct value';
            break;   
    }
}
echo implode('', $convertedArray);








/*
//$input = $word_input;
//print_r(explode(" ", $str, 0));
function wordsTodigit($inputArray){
    $input = readline('Enter numbers in word:');

    $iarr = explode('; ', $input);
    $result ='';
    foreach($iarr as $value){
        switch(trim($value)){
            case 'zero':
                $result .= '0';

            case 'one':
                $result .= '1';

            case 'two':
                $result .= '2';

            case 'three':   
                $result .= '3';

            case 'four':
                $result .= '4';

            case 'five':
                $result .= '5';

            case 'six':
                $result .= '6';

            case 'seven':
                $result .= '7';

            case 'eight':
                $result .= '8';

            case 'nine':
                $result .= '9';     
           }
        }
        return $result;
    }
        
      
    //echo word_input;
    */
    
    