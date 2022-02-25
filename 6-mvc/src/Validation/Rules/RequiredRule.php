<?php 
namespace Src\Validation\Rules;

use Src\Validation\Rules\Contracts\Rule;

class RequiredRule implements Rule {
    public function apply($field,$value,$data) :bool
    {
        return !empty($value);
    }

    public function __toString(){ 
        return "%f is required";
    }
}
