<?php
$input = readline('Enter numbers in word:');
$input = array("Zero" =>"0", "One" =>"1",  "Two" =>"2", "Three" =>"3", "Four" =>"4", "Five" =>"5", "Six" =>"6", "Seven" =>"7", "Eight" =>"8", "Nine" =>"9");
print_r (explode(" ",$input()));


/*
//$input = $word_input;
//print_r(explode(" ", $str, 0));
function word_input($input){
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
    
    