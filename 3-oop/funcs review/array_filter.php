<?php

// 'hend@gmail.com','123456'

$users = [
    [
        'id'=>1,
        'email'=>'galal.husseny@gmail.com',
        'password'=>'123456',
        'gender'=>'m'
    ],
    [
        'id'=>1,
        'email'=>'saad@gmail.com',
        'password'=>'123456',
        'gender'=>'m'
    ],
    [
        'id'=>1,
        'email'=>'hend@gmail.com',
        'password'=>'123456',
        'gender'=>'f'
    ]
    ,
    [
        'id'=>1,
        'email'=>'soad@gmail.com',
        'password'=>'123456',
        'gender'=>'f'
    ]
];



$result = new_array_filter($users,function ($value){
    return $value['email'] == 'hendd@gmail.com' && $value['password'] == '123456'; //condition
});
// print_r($result);
function new_array_filter(array $array,callable $function) :array {
    foreach ($array as $key => $value) {
        $return = $function($value);
        if($return == true){
            return [$key=>$value];
        }
    }
    return [];
}