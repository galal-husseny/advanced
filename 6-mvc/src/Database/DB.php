<?php 
namespace Src\Database;

use SQLite3;
use Src\Database\Mangers\Contracts\DatabaseManger;
use Src\Database\Connection\ConnectsTo;

class DB {
    protected DatabaseManger $manger;
    public function __construct(DatabaseManger $manger) {
        $this->manger = $manger;
    }

    public function init()
    {
        ConnectsTo::connect($this->manger);
    }

    public function query(string $query , array $values = [])
    {
        $this->manger->query($query,$values);
    }

    public function create(array $data){
        $this->manger->create($data);
    }
    public function read(array|string $columns = '*',?array $filter=null){
        return $this->manger->read($columns,$filter);
    }
    public function update(array $data , ?array $filter=null){
        $this->manger->update($data,$filter);
    }
    public function delete(?array $filter=null){
        $this->manger->delete($filter);
    }

}

// SOLID
// single
// open
// liskove
// interfance
// dependency