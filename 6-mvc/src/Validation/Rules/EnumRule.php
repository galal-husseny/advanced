<?php 
namespace Src\Validation\Rules;

use Src\Validation\Rules\Contracts\Rule;

class EnumRule implements Rule {
    private array $allowedValues; 
    public function __construct() {

        $this->allowedValues = func_get_args();
    }
    public function apply($field,$value,$data) :bool
    {
        return in_array($value,$this->allowedValues);
    }

    public function __toString(){ 
        return "%f value invalid";
    }
}
