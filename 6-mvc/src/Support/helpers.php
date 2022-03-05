<?php

use Src\View\View;
use Src\Application;
use Src\Support\Hash;
use Src\Http\Response;
use Src\Support\Crypt;

function ds(){
    return DIRECTORY_SEPARATOR;
}

function base_path(){
    return dirname(__DIR__ ) . ds(). '..' . ds();
}

function view_path(){
    return base_path() . 'views' . ds();
}

function component_path(string $component){
    return view_path() . 'components' . ds() . $component . '.php';
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
    View::abort($code);die;
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

function serverProtocol () :string{
    return strtolower(explode('/',$_SERVER['SERVER_PROTOCOL'])[0]);
}

function url(string $url = '') 
{
    // http://127.0.0.1:8000/
    if(!str_starts_with($url,'/')){
        $url = "/$url";
    }
    return (serverProtocol()."://".$_SERVER['HTTP_HOST'] . $url);
}

function redirect(string $url){
    return header("location:{$url}");
}

function back(){
    (new Response)->back();
}

function old(string $key) 
{
    if(session()->hasFlash('old')){
        return session()->getFlash('old')[$key] ?? '';
    }
}

function session(){
    return app()->session;
}

function encrypt(string $string){
    return Crypt::encryptString($string);
}

function decrypt(string $encryptedString){
    return Crypt::decryptString($encryptedString);
}