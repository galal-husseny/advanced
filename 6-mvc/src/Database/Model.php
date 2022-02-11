<?php 
namespace Src\Database;

use Src\Support\Str;

abstract class Model {
    private static $inovker;
    public static function create(array $data)
    {
        self::$inovker = static::class;
        app()->db->create($data);
    }

    public static function delete(?array $filter=null)
    {
        self::$inovker = static::class;
        app()->db->delete($filter);
    }

    public static function update(array $data ,?array $filter=null)
    {
        self::$inovker = static::class;
        app()->db->update($data,$filter);
    }

    public static function all(){
        self::$inovker = static::class;
        return app()->db->read();
    }
    public static function select(array|string $columns="*",?array $filter=null){
        self::$inovker = static::class;
        return app()->db->read($columns,$filter);
    }

    public static function where(array $filter){
        self::$inovker = static::class;
        return app()->db->read(filter: $filter);
    }

    public static function getModel (){
        return self::$inovker;
    }

    public static function tableName() :string
    {
        return Str::lower(Str::pluralize(Str::get_class_name(self::$inovker)));
    }
}

