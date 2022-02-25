<?php 
namespace Src\Http;

class Response {
    public function back()
    {
        header('location:'.$_SERVER['HTTP_REFERER'] ?? url('/'));die;
    }

    public function statusCode(int $statusCode)
    {
        http_response_code($statusCode);
    }
}