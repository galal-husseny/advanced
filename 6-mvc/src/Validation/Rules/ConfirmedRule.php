<?php 
namespace Src\Validation\Rules;

use Src\Validation\Rules\Contracts\Rule;

class ConfirmedRule implements Rule {
    public function apply($field,$value,$data) :bool
    {
        return $data[$field] == $data[$field.'_confirmation'];
    }

    public function __toString()
    {
        return "%f dosen't match %f_confirmation";
    }
}