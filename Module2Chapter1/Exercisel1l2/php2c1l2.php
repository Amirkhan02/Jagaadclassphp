<?php
$data = array(5, 3, 12, 7, 99, 16, 55, 0, 57, 1, 44);

$n=count($data);
$even = 0;        
$odd = 0;            
         
    for( $i = 0 ; $i < $n; $i++)
    {
        
        if ($data[$i] & 1 == 1)
            $odd ++ ;    
        else               
            $even ++ ;        
    }
 
    echo "even = $even \n odd  = $odd" ;

?>
