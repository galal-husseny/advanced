<?php 
namespace Src\Validation\Rules;

use Src\Validation\Rules\Contracts\Rule;

class BetweenRule implements Rule {
    private int $max;
    private int $min;
    public function __construct($min,$max) {
        $this->max = $max;
        $this->min = $min;
    }
    public function apply($field,$value,$data) :bool
    {
        return ((strlen($value) <= $this->max) && (strlen($value) >= $this->min));
    }

    public function __toString(){ 
        return "%f must be between {$this->min} and {$this->max}";
    }
}
