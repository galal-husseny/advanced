<?php 
namespace Src\Validation;

use Src\Validation\Rules\AlphaNumericalRule;
use Src\Validation\Rules\Contracts\Rule;
use Src\Validation\Rules\RequiredRule;

class RulesResolver {
    public static function make(string|array $rules) :array // array of objects
    {
        $rules = (array) (( is_string($rules) && str_contains($rules,'|') ) ? explode('|',$rules): $rules);
        return array_map(function($rule){
            if(is_string($rule)){
                return Self::convertStringRuleToObject($rule);
            }
            return $rule;
        },$rules);
    }

    private static function convertStringRuleToObject(string $rule) : Rule
    {
        $args = [];
        if(str_contains($rule,':')){
            $ruleArray = explode(':',$rule);
            $rule = $ruleArray[0];
            if(str_starts_with(end($ruleArray),'/') && str_ends_with(end($ruleArray),'/')){
                $args = (array) end($ruleArray);
            }else{
                $args = explode(',',end($ruleArray));
            }
        }
        return RulesMapper::resolve($rule,$args); // rule name 
    }
}