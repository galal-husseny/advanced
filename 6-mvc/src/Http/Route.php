<?php

namespace Src\Http;

use Exception;

class Route {

    public static array $routes = [];

    protected Request $request;
    public function __construct(Request $request) {
        $this->request = $request;
    }

    public static function get(string $uri ,array|callable $action) :void
    {
        $uri = self::routeSlash($uri);
        self::$routes['get'][$uri] = $action;
    }

    public static function post(string $uri ,array|callable $action) :void
    {
        $uri = self::routeSlash($uri);
        self::$routes['post'][$uri] = $action;
    }

    public static function routeSlash(string $uri) :string
    {
        if(!str_starts_with($uri,'/')){
            $uri = "/$uri";
        }

        return $uri;
    }

    public function resolve()
    {
        // self::$routes;
        // instance of Request
        // path() , method()
        $requestPath = $this->request->path();
        $requestMethod = $this->request->method();
        $requestData = $this->request->all();
        $action = self::$routes[$requestMethod][$requestPath] ?? false;
        
        // validation => 404 , 405
        $this->rotueValidation();

        if(is_callable($action)){
            call_user_func($action,$requestData);
        }

        if(is_array($action)){
            $controller = new $action[0];
            $method = $action[1];
            call_user_func([$controller,$method],$requestData);
        }

        

    }

    private function rotueValidation(){
        $pathValidation = false;
        $methodValidation = false;
        foreach (Self::$routes as $method => $methodRoutes) {
            foreach ($methodRoutes as $path => $action) {
                if($path == $this->request->path()){
                    $pathValidation = true;
                }
            }
        }


        foreach (Self::$routes[$this->request->method()] as $path => $action) {
            if($path == $this->request->path()){
                $methodValidation = true;
            }
        }

        if(!$pathValidation){
            abort(404);
        }

        if($pathValidation && !$methodValidation){
            abort(405);
        }
    }


}