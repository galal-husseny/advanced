<?php

use Src\Application;
use Src\Support\Hash;
use Src\View\View;

function ds(){
    return DIRECTORY_SEPARATOR;
}

function base_path(){
    return dirname(__DIR__ ) . ds(). '..' . ds();
}

function view_path(){
    return base_path() . 'views' . ds();
}
function error_path(){
    return view_path() . 'errors' . ds();
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

function view(string $view,array $data = []){
    View::make($view,$data);
}

function abort(int $code){
    View::abort($code);
}

function app(){
    static $isntance = null;
    if(!$isntance){
        $isntance = new Application;
    }
    return $isntance;
}

function bcrypt(string $value) :string
{
    return Hash::make($value);
}
