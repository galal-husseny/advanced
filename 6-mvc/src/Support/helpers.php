<?php

function ds(){
    return DIRECTORY_SEPARATOR;
}

function base_path(){
    return dirname(__DIR__ ) . ds(). '..' . ds();
}

function view_path(){
    return base_path() . 'views' . ds();
}

function public_path(){
    return base_path() . 'public' . ds();
}

function app_path(){
    return base_path() . 'app' . ds();
}

function env(string $key,$default = null) :?string
{ 
   if(!empty($_ENV[$key])){
       return $_ENV[$key];
   }else{
       return $default;
   }
}