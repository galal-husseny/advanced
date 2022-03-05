<?php

namespace Src\View;

use Exception;

class View
{
    public static function make(string $view, array $data = [])
    {
        $parentContent = self::getParentContent(); // html of parent as string
        $viewContent = self::getViewContent(view: $view, params: $data); // html of view as string
        $title = self::getTitle($viewContent);
        $parentContentAfterTitle = str_replace('{{title}}',$title,$parentContent);
        echo str_replace('{{content}}', $viewContent, $parentContentAfterTitle);
    }

    public static function getParentContent()
    {
        ob_start();
        include view_path() . 'layouts' . ds() . 'app.php';
        return ob_get_clean();
    }

    public static function getViewContent(string $view, $isError = false, array $params = [])
    {
        $path = $isError ? error_path() : view_path() . 'backend' . ds();
        // 'backend.home';
        // 'backend/home';
        $view = self::pathBuilder($path, $view);
        if (!file_exists($view)) {
            // dd($view);
            throw new Exception("View Not Found", 500);
        }
        if ($isError) {
            return include $view;
        } else {
            // convert params to vars 
            foreach ($params as $var => $value) {
                $$var = $value; // variable variable
            }
            ob_start();
            include $view;
            return ob_get_clean();
        }
    }

    private static function pathBuilder(string $path, string $view): string
    {
        if (str_contains($view, '.')) {
            $path .= str_replace('.', ds(), $view);
        } elseif (str_contains($view, '/')) {
            $path .= str_replace('/', ds(), $view);
        } else {
            $path .= $view;
        }
        $path .= '.php';
        return $path;
    }

    public static function abort(int $code)
    {
        self::getViewContent((string)$code, true);
    }

    public static function getTitle(string &$viewContent)
    {
        $start = '{{title=';
        $end = '}}';

        $pattern = sprintf(
            '/%s(.+?)%s/ims',
            preg_quote($start, '/'),
            preg_quote($end, '/')
        );

        if (preg_match($pattern, $viewContent, $matches)) {
            list(, $match) = $matches;
            $viewContent = str_replace("{{title=$match}}","",$viewContent);
            return $match;
        }
    }
}


// implode(array:[],separator:'.');
// named arguments