<?php 
namespace Src\Database\Grammers;

use Src\Database\Model;

class MYSQLGrammer {
    public static function buildInsertQuery($columns)
    {
        $binding = "(";
        for ($i=1; $i <= count($columns); $i++) { 
            $binding .= " ?";
            if($i < count($columns)){
                $binding .= ",";
            }
        }
        $binding .= ")";
        $columns = '(`'.implode('`, `' ,$columns) . '`)';
        $query = "INSERT INTO `" .Model::tableName() . "` $columns VALUES $binding";  
        return $query;
    }

    public static function buildUpdateQuery($columns , ?array $filter = null){
        // "UPDATE `table` SET `name` = ? , `email` = ? WHERE `id` = ?";
        $binding = "";
        for ($i=1; $i <= count($columns); $i++) { 
            $binding .= "`{$columns[$i-1]}` = ?";
            if($i < count($columns)){
                $binding .= ",";
            }
        }
        $query = "UPDATE `" . Model::tableName() . "` SET $binding ";
        if($filter){
            // ['id','>=',5]
            $query .= "WHERE `{$filter[0]}` {$filter[1]} ?";
        }
        return $query;
    }

    public static function buidSelectQuery(array|string $columns = "*",?array $filter = null)
    {
    //     "SELECT * FROM `users`";
    //      "SELECT * FROM `users` WHERE `id` = 4";
    //     "SELECT `id` , `name` FROM `users` WHERE `id` = 6";
    //     "SELECT `id` , `name` , `email` FROM `users`";
        if(is_array($columns)){
            $columns = '`'.implode('`, `' ,$columns) . '`';
        }
        $query = "SELECT {$columns} FROM `" . Model::tableName().'` ';
        if($filter) {
            $query .= "WHERE `{$filter[0]}` {$filter[1]} ?";
        }
        return $query;
    }

    public static function buildDeleteQuery(?array $filter=null)
    {
        $query = "DELETE FROM `". Model::tableName() . "` ";
        if($filter) {
            $query .= "WHERE `{$filter[0]}` {$filter[1]} ?";
        }
        return $query;
    }
}