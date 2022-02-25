<?php 
namespace Src\Validation\Rules;

use Src\Validation\Rules\Contracts\Rule;

class UniqueRule implements Rule {
    private string $table;
    private string $column;
    public function __construct(string $table,string $column) {
        $this->table = $table;
        $this->column = $column;
    }
    public function apply($field,$value,$data) :bool
    {
        return ! (bool) app()->db->query("SELECT * FROM `{$this->table}` WHERE `{$this->column}` = ?",[$value]);
    }

    public function __toString(){ 
        return "this %f has already been taken";
    }
}