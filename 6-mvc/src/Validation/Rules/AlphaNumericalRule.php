<?php 
namespace Src\Validation\Rules;

use Src\Validation\Rules\Contracts\Rule;

class AlphaNumericalRule implements Rule {
    public function apply($field,$value,$data) :bool
    {
        return (bool) preg_match('/^[A-Za-z0-9_]+$/',$value);
    }

    public function __toString(){ 
        return "%f must be characters and numbers only";
    }
}