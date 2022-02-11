<?php 


class Model {
    public static function classNameUsingSelf()
    {
        return self::class;
    }

    public static function classNamUsingStatic()
    {
        return static::class;
    }
}