<?php
namespace Src\Support;
class Hash {
    public static function make(string|int|float $value) :string
    {
        return password_hash($value,PASSWORD_BCRYPT);
        //bcrypt
    }

    public static function check(string|int|float $value,string $hashedValue) :bool
    {
       return password_verify($value,$hashedValue);
       //verify
    }

    public static function token($value = "Default")
    {
        return sha1($value . time());
        //token
    }
}
