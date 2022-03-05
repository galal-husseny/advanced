<?php 
namespace Src\Validation;
use Src\Validation\ErrorBag;
use Src\Validation\RulesMapper;
use Src\Validation\RulesResolver;
use Src\Validation\Rules\Contracts\Rule;


class Validator {
    protected array $data = [];
    protected array $rules = [];
    protected array $aliases = [
        'password_confirmation' => 'password confirmation'
    ];

    protected ErrorBag $errorBag;

    public function make($data,$rules,$redirect = true)
    {
       $this->data = $data;
       $this->rules = $rules;
       $this->errorBag = new ErrorBag;
       $this->validate();
       if($redirect){
            if(!$this->passed() ){
                session()->setFlash('errors',$this->errors());
                session()->setFlash('old',$data);
                return back();
            }
       }
    }

    public function validate()
    {
        foreach ($this->rules AS $field => $rules) {
            foreach (RulesResolver::make($rules) as $rule) {
               $this->applyRule($field,$rule);
            }
        }
    }

    private function applyRule($field,Rule $rule){
        if(!$rule->apply( $field , $this->getfieldValue($field) , $this->data)){
            $this->errorBag->add($field,Message::generate($field,$rule));
        }
    }

    public function errors($key = null)
    {
        return $this->errorBag->getErrors($key);
    }

    public function passed()
    {
        return $this->errorBag->ok();
    }

    public function setAliases(array $aliases){
        $this->aliases = $aliases;
    }

    public function getAlias($field)
    {
        return $this->aliases[$field] ?? $field;
    }

    public function getfieldValue($field)
    {
        return $this->data[$field] ?? false;
    }

    public function setRules(array $rules){
        $this->rules = $rules;
    }
}