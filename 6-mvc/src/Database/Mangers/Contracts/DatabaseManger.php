<?php 
namespace Src\Database\Mangers\Contracts;

interface DatabaseManger {
    public function connect() :\PDO;
    public function query(string $query,array $values = []);
    public function create(array $data);
    public function read(array|string $columns = '*',?array $filter=null);
    public function update(array $data , ?array $filter=null);
    public function delete(?array $filter=null);
}
