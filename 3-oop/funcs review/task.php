<?php

$array = [1,2,3]; 
function new_count($array){ // 3
    $count = 0;
    foreach ($array AS $value){
        $count++; // 1 // 2 // 3
    }
    return $count;//3
}


// count = 3 , lastindex = 3-1 = 2 , next index = 3 = count
function new_array_push(&$array,...$values){
    foreach($values AS $value){
        $array[] = $value;
    }
    return new_count($array);
}

 new_array_push($array,4,5,6);
// print_r($array);


// echo array_push($array,4,5,6);
// print_r($array);


// echo array_sum([1,2,3,4]);

function new_array_sum($array){ // [1,2,3]
    $total = 0;
    foreach ($array as $value) {
        $total += $value;
    }
    return $total;
}

// echo new_array_sum([1,2,3,4]);

// array_filter (allow some elements , prevent the others) 

// array_filter();

function click(callable $function){
    //call
    // echo "click";
    $function();
    // call_user_func($function);
}
// function test (){
//     echo 'test';
// }


// invoke('test');

// click(function(){
//     echo 'test';
// });

$button = "register";  // register
if($button == "login"){
    click(function(){
        echo "Email & Password";
    });
}else{
    click(function(){
        echo "Email & Password & Name";
    });
}


$x = function ($message) {
    echo $message;
};

// $x("welcome");

// call_user_func($x,"welcome from call user fun");

?>






