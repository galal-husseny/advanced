<?php 
namespace Src\Auth;

use App\Models\User;
use Src\Database\Model;

class Auth {

    public function init()
    {
        if(self::checkOnRemember()){
            $remember_token = decrypt($_COOKIE['remember_me']);
            $user = User::where(['remember_token','=',$remember_token])->first();
            if($user->remember_token == $remember_token){
                self::login($user);
            }
        }
    }

    public static function login(Model $object)
    {
        session()->put('auth',$object);
    }

    public static function user()
    {
        return session()->get('auth') ?? null; 
    }

    public static function remember(Model $person)
    {
        $rememberToken = uniqid("",true);
        get_class($person)::update(['remember_token'=>$rememberToken],['id','=',$person->id]);
        setcookie('remember_me',encrypt($rememberToken),time()+env('REMEMBER_TOKEN_EXPIRATION'),'/');
    }

    public static function checkOnRemember() :bool
    {
        return isset($_COOKIE['remember_me']);
    }

    public static function rememberExpiration()
    {
       setcookie('remember_me','',time()-1,'/');
    }
}