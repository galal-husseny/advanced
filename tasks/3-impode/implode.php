<?php
$array = ["soaad",'saad','hend','rowaida','abdrhman'];

function new_count($array){ // 3
    $count = 0;
    foreach ($array AS $value){
        $count++; // 1 // 2 // 3
    }
    return $count;//3
}


function converArrayToString(string $seperator , array $array) :string{
    $lastIndex = new_count($array) - 1;
    $string = "";
    for ($i=0; $i <= $lastIndex; $i++) { 
        // $string .= $array[$i];
        // if($i != $lastIndex){
        //     $string .=  $seperator;
        // }
        $string .= $lastIndex == $i ? $array[$i] : $array[$i] . $seperator;
    }
    return $string;
}

echo converArrayToString(" ",$array);