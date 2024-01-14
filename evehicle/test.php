<?php

// This function will return a random
// string of specified length
function random_string($length_of_string)
{

    // String of all alphanumeric character
    $str_result = 'abcdefghijklmnopq';

    // Shuffle the $str_result and returns substring
    // of specified length
    return substr(str_shuffle($str_result),
                    0, $length_of_string);
}

function random_number($length_of_string)
{

    // String of all alphanumeric character
    $str_result = '0123456789';

    // Shuffle the $str_result and returns substring
    // of specified length
    return substr(str_shuffle($str_result),
                    0, $length_of_string);
}

$password = random_string(2) . random_number(6);
echo $password;


?>
