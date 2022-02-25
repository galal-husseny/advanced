<?php 
namespace Src\Validation\Rules;

use Src\Validation\Rules\Contracts\Rule;

class ExistsRule implements Rule {
    private string $table;
    private string $column;
    public function __construct(string $table,string $column) {
        $this->table = $table;
        $this->column = $column;
    }
    public function apply($field,$value,$data) :bool
    {
        return (bool) app()->db->query("SELECT * FROM `{$this->table}` WHERE `{$this->column}` = ?",[$value]);
    }

    public function __toString(){ 
        return "this %f dosn't match our records";
    }
}