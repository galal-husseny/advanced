<?php

// 1
// 2 
// 3


$counter = 1;
// pass by value
function incrementCounter($counter) {
    // $x = 5;
    echo $counter .'<br>';
    $counter++;
}

// incrementCounter($counter) ;
// incrementCounter($counter) ;
// incrementCounter($counter) ;

// echo $counter;

// pass by reference
$counter = 1; //2 // 3

function incrementCounterByRef(&$counter){
    echo $counter .'<br>';
    $counter++; // reference
}

// incrementCounterByRef($counter);
// incrementCounterByRef($counter);
// incrementCounterByRef($counter);

// pass by reference 
$counter = 1;
function incrementCounterByRefV2 (){
    global $counter;
    echo $counter .'<br>';
    $counter++; // reference
}

incrementCounterByRefV2();
incrementCounterByRefV2();
incrementCounterByRefV2();