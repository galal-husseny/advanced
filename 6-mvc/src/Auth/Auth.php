<?php 
namespace Src\Auth;

use Src\Database\Model;

class Auth {
    public static function login(Model $object)
    {
        app()->session->put('auth',$object);
    }

    public static function user()
    {
        return app()->session->get('auth') ?? null; 
    }
}