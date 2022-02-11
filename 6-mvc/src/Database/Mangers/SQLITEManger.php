<?php 
namespace Src\Database\Mangers;

use PDO;
use Src\Database\Mangers\Contracts\DatabaseManger;

class SQLITEManger implements DatabaseManger {

    public function connect() : PDO
    {
       return new PDO(""); 
    }

    public function query(string $query,array $values = []){
        
    }

    public function create(array $data){

    }
    public function read(array|string $columns = '*',?array $filter=null){

    }
    public function update(array $data , ?array $filter=null){

    }
    public function delete(?array $filter=null){

    }
}