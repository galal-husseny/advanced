<?php

namespace Src\Http;

class Request {
    public function method() :string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function path() :string
    {
        $path = $_SERVER['REQUEST_URI'];
        if(str_contains($path,'?')){
            $path = explode('?',$path)[0];
        }
        return $path;
        // return str_contains($path,'?') ? explode('?',$path)[0] : $path;
    }
    
    public function all() :array
    {
        return $_REQUEST; // array
    }
}