<?php 
namespace Src\Validation\Rules;

use Src\Validation\Rules\Contracts\Rule;

class EmailRule implements Rule {
    public function apply($field,$value,$data) :bool
    {
        return (bool) preg_match('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/',$value);
    }

    public function __toString(){ 
        return "%f must be vaild email address";
    }
}