<?php
// soaad
// $array = [1,2];
// $value = 3;
// function array_push_php($array,$value){
//     // print_r($array);
//     $array[] = $value;
// }
// array_push_php($array,$value);
// print_r($array);


// hend
$array = [1,2];
$value = 3;
function array_push_php_v2(&$array,$value){
    $array[] = $value;
}
array_push_php_v2($array,$value);
print_r($array);