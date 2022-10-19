<?php
//$name = 'Hammed';
/*
$company = 'Jagaad';
$name ="Hammed, $company";
echo "cmd $name \nTest\n";
echo 'cmd $name \nTest'; */


/*
//heredoc syntax
echo <<<END
 1
 12
 123
 1234
 12345
 \n
 END;
 */
/*
echo <<<HTML
"my content"
$name
 HTML;
 */

//nowdoc syntax

/*
$myVar = <<<'END'
 "my content"
 $name
 END;
 echo $myVar . 'something else'; */

/*
echo <<<'HTML'
"my content"
$name
HTML; */
 
//Array
/*
$array = array(
    "foo" => "bar",
    "bar" => "foo",
);

$array = [
    "foo" => "bar",
    "bar" => "foo",
];

$array = [
    1 => "a",
    "1" => "b",
    1.5 => "c",
    true => "d",
];
var_dump($array); */

$book = [
    'title' => 'Mordern PHP',
    'pages' => 100,
    'edition' => 2,
    'author' => [
        'id' =>'ID3848',
        'name' => 'Robert C. M',
        'birth_year' => 1956,
         ]
    ];
    echo 'Book name: ' . $book['title'] . PHP_EOL;
    echo 'Book author:' . $book['author']['name'];
    





?>