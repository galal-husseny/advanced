<?php
namespace Src\Validation;
class ErrorBag {
    public array $errors = [];
    public function add($field,$message)
    {
        $this->errors[$field][] = $message;
    }
    public function ok()
    {
        return empty($this->errors);
    }

    public function getErrors($key = null)
    {
        return $key ? $this->errors[$key] : $this->errors;
    }
}

