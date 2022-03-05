<?php 
namespace Src\Support;

class Crypt {
    public static function encryptString(string $string) : string
    {
        return openssl_encrypt(
            $string,
            env('ENCRYPTION_CIPHERING_METHOD'),
            env('ENCRYPTION_KEY'),
            0,
            env('ENCRYPTION_IV')
        );
    }

    public static function decryptString(string $encryptedString) : string
    {
        return openssl_decrypt(
            $encryptedString,
            env('ENCRYPTION_CIPHERING_METHOD'),
            env('ENCRYPTION_KEY'),
            0,
            env('ENCRYPTION_IV')
        );
    }
}