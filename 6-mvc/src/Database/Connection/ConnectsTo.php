<?php
namespace Src\Database\Connection;

use Src\Database\Mangers\Contracts\DatabaseManger;
use Src\Database\Mangers\MYSQLManger;
use Src\Database\Mangers\SQLITEManger;

trait ConnectsTo {

    public static function connect(DatabaseManger $manger){
        // connect ayan kan men manger
        return $manger->connect();
    }

    public static function getManger()
    {
        // conditions => env => return manger
        return match(env('DB_CONNECTION')){
            'mysql'=> new MYSQLManger,
            'sqlite'=> new SQLITEManger,
            default => new MYSQLManger
        };
    }
}