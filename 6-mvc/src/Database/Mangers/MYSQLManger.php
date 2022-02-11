<?php 
namespace Src\Database\Mangers;
use PDO;
use Src\Database\Grammers\MYSQLGrammer;
use Src\Database\Mangers\Contracts\DatabaseManger;
use Src\Database\Model;

class MYSQLManger implements DatabaseManger {
    protected static $instance;
    public function connect() : PDO
    {
        if(!self::$instance){
            self::$instance = new PDO(env('DB_CONNECTION').":host=".env('DB_HOST').";dbname=".env('DB_DATABASE'),env('DB_USERNAME'),env('DB_PASSWORD'));
        }
        return self::$instance;  
    }

    public function query(string $query,array $values = []){
        //
    }

    public function create(array $data){
        $query = MYSQLGrammer::buildInsertQuery(array_keys($data));
        $stmt = self::$instance->prepare($query);
        // [ ? ? ?]
        $values = array_values($data);
        for ($i=1; $i <= count($data); $i++) { 
            $stmt->bindValue($i , $values[$i-1]);
        }
        
        return $stmt->execute();
    }

    public function update(array $data , ?array $filter=null){
        $query = MYSQLGrammer::buildUpdateQuery(array_keys($data),$filter);
        $stmt = self::$instance->prepare($query);
        $values = array_values($data);
        for ($i=1; $i <= count($data); $i++) { 
            $stmt->bindValue($i , $values[$i-1]); // 1 // 2 //
        }
        if($filter){
            $stmt->bindValue($i,$filter[2]); //3
        }
        return $stmt->execute();

    }


    public function read(array|string $columns = '*',?array $filter=null){
        $query = MYSQLGrammer::buidSelectQuery($columns,$filter);
        $stmt = self::$instance->prepare($query);
        if($filter){
            $stmt->bindValue(1,$filter[2]); //3
            
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS,Model::getModel());
    }
   
    public function delete(?array $filter=null){
        $query = MYSQLGrammer::buildDeleteQuery($filter);
        $stmt = self::$instance->prepare($query);
        if($filter){
            $stmt->bindValue(1,$filter[2]); //3
            
        }
        return $stmt->execute();
    }
}



