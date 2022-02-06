<?php
namespace Src\View;

use Exception;

class View {
    public static function make(string $view , array $data = [])
    {
        $parentContent = self::getParentContent(); // html of parent as string
        $viewContent = self::getViewContent(view:$view,params:$data); // html of view as string 
        echo str_replace('{{content}}',$viewContent,$parentContent);
    }
    
    public static function getParentContent()
    {
        ob_start();
        include view_path() . 'layouts' . ds() . 'app.php';
        return ob_get_clean();
    }

    public static function getViewContent(string $view , $isError = false , array $params = [])
    {
        $path = $isError ? error_path() : view_path() . 'backend' . ds();
        // 'backend.home';
        // 'backend/home';
        $view = self::pathBuilder($path, $view);
        if(!file_exists($view)){
            // dd($view);
            throw new Exception("View Not Found",500);
        }
        if($isError){
            return include $view;
        }else{
            // convert params to vars 
            foreach($params AS $var=>$value){
                $$var = $value; // variable variable
            }
            ob_start();
            include $view;
            return ob_get_clean();
        }
    }

    private static function pathBuilder(string $path, string $view) :string
    {
        if(str_contains($view,'.')){
            $path .= str_replace('.',ds(),$view);
        }elseif(str_contains($view,'/')){
            $path .= str_replace('/',ds(),$view);
        }else{
            $path .= $view;
        }
        $path .= '.php';
        return $path;
    }

    public static function abort(int $code){
        self::getViewContent((string)$code,true);
    }
}


// implode(array:[],separator:'.');
// named arguments