<?php 
namespace Src\Validation;
class Message {
    public static function generate($field,$message)
    {
        return str_replace('%f',$field,$message);
    }
}


