<?php 
namespace Src\Validation\Rules;

use Src\Validation\Rules\Contracts\Rule;

class MaxRule implements Rule {
    private int $max;
    public function __construct($max) {
        $this->max = $max;
    }
    public function apply($field,$value,$data) :bool
    {
        return strlen($value) <= $this->max;
    }

    public function __toString(){ 
        return "%f must be less than {$this->max}";
    }
}
