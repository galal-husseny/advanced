<?php 
namespace Src\Validation;

use Src\Validation\Rules\RequiredRule;
use Src\Validation\Rules\AlphaNumericalRule;
use Src\Validation\Rules\BetweenRule;
use Src\Validation\Rules\ConfirmedRule;
use Src\Validation\Rules\EmailRule;
use Src\Validation\Rules\EnumRule;
use Src\Validation\Rules\ExistsRule;
use Src\Validation\Rules\MaxRule;
use Src\Validation\Rules\RegularExpressionRule;
use Src\Validation\Rules\UniqueRule;

class RulesMapper {
    protected static array $ruleMap = [
        'required'=>RequiredRule::class,
        'alnum' =>AlphaNumericalRule::class,
        'max'=>MaxRule::class,
        'between'=>BetweenRule::class,
        'email'=>EmailRule::class,
        'confirmed'=>ConfirmedRule::class,
        'unique'=>UniqueRule::class,
        'regex'=>RegularExpressionRule::class,
        'enum'=>EnumRule::class,
        'exists'=>ExistsRule::class
    ];

    public static function resolve(string $rule,array $args)
    {

        return new RulesMapper::$ruleMap[$rule](...$args);
    }
}
