<?php 
namespace Src\Validation\Rules;

use Src\Validation\Rules\Contracts\Rule;

class RegularExpressionRule implements Rule {
    private string $regex;
    public function __construct($regex) {
        $this->regex = $regex;
    }

    public function apply($field,$value,$data) :bool
    {
        return (bool) preg_match($this->regex,$value);
    }

    public function __toString(){ 
        return "%f format invalid";
    }
}